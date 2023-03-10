<?php
/**
 * Created by PhpStorm.
 * User: me
 * Date: 2019/4/14
 * Time: 20:49
 */

namespace App\Klsf\Dns;
class Dnspod implements DnsInterface
{
    use DnsHttp;
    private $url = "https://dnsapi.cn/";
    private $id;
    private $token;
    private $params = [];


    public function deleteDomainRecord($RecordId, $DomainId = null, $Domain = null)
    {
        $params = [];
        $DomainId && $params['domain_id'] = $DomainId;
        $Domain && $params['domain'] = $Domain;
        $params['record_id'] = $RecordId;
        list($ret, $error) = $this->getResult("Record.Remove", $params);
        return $ret ? [true, null] : [false, $error];
    }

    public function updateDomainRecord($RecordId, $Name, $Type, $Value, $LineId, $DomainId = null, $Domain = null)
    {
        $params = [];
        $DomainId && $params['domain_id'] = $DomainId;
        $Domain && $params['domain'] = $Domain;
        $params['record_id'] = $RecordId;
        $params['sub_domain'] = $Name;
        $params['record_type'] = $Type;
        $params['value'] = $Value;
        $params['mx'] = 20;
        $params['record_line_id'] = $LineId;
        list($ret, $error) = $this->getResult("Record.Modify", $params);
        return $ret ? [true, null] : [false, $error];
    }

    public function addDomainRecord($Name, $Type, $Value, $LineId, $DomainId = null, $Domain = null)
    {
        $params = [];
        $DomainId && $params['domain_id'] = $DomainId;
        $Domain && $params['domain'] = $Domain;
        $params['sub_domain'] = $Name;
        $params['record_type'] = $Type;
        $params['value'] = $Value;
        $params['mx'] = 20;
        $params['record_line_id'] = $LineId;
        list($ret, $error) = $this->getResult("Record.Create", $params);
        if (!$ret) return [false, $error];
        if (isset($ret['record'])) {
            $record = $ret['record'];
            return [[
                'RecordId' => $record['id'],
                'Name' => $record['name'],
                'Domain' => $Domain
            ], null];
        }
        return [false, '????????????????????????'];
    }

    public function getDomainRecordInfo($RecordId, $DomainId = null, $Domain = null)
    {
        $params = [];
        $DomainId && $params['domain_id'] = $DomainId;
        $Domain && $params['domain'] = $Domain;
        $params['record_id'] = $RecordId;
        list($ret, $error) = $this->getResult("Record.Info", $params);
        if (!$ret) return [false, $error];
        if (isset($ret['record'])) {
            $record = $ret['record'];
            return [[
                'RecordId' => $record['id'],
                'Name' => $record['sub_domain'],
                'Type' => $record['record_type'],
                'Value' => $record['value'],
                'Domain' => $record['domain']
            ], null];
        }
        return [false, '??????????????????????????????'];
    }

    public function getDomainRecords($DomainId = null, $Domain = null)
    {
        $params = [];
        $DomainId && $params['domain_id'] = $DomainId;
        $Domain && $params['domain'] = $Domain;
        list($ret, $error) = $this->getResult("Record.List", $params);
        if (!$ret) return [false, $error];

        if (isset($ret['records'])) {
            $Domain = $ret['domain']['name'];
            $list = [];
            foreach ($ret['records'] as $record) {
                $list[] = [
                    'RecordId' => $record['id'],
                    'Name' => $record['name'],
                    'Type' => $record['type'],
                    'Value' => $record['value'],
                    'Domain' => $Domain
                ];
            }
            return [$list, null];
        }
        return [false, '??????????????????????????????'];
    }

    public function getDomainList()
    {
        list($ret, $error) = $this->getResult("Domain.List");
        if (!$ret) return [false, $error];

        if (isset($ret['domains'])) {
            $list = [];
            foreach ($ret['domains'] as $domain) {
                $list[] = [
                    'Domain' => $domain['name'],
                    'DomainId' => $domain['id']
                ];
            }
            return [$list, null];
        }
        return [false, '????????????????????????'];
    }

    public function getRecordLine($_domainId = null, $_domain = null)
    {
        //????????????????????????????????????????????????????????????????????????????????????
        $str = '??????:0,??????:7=0,??????:3=0,??????:10=0,??????:10=1,?????????:10=2,??????:10=3,??????:90=0,??????:90=1,??????:90=4,??????:90=2,??????:90=3,??????:90=5,??????:90=6,????????????:80=0';
        $l1 = explode(',', $str);
        $list = array();
        foreach ($l1 as $str) {
            $l2 = explode(':', $str);
            $list[] = array(
                'Name' => $l2[0],
                'Id' => $l2[1],
            );
        }
        return $list;
    }

    public function check()
    {
        list($ret, $error) = $this->getResult("Info.Version");
        return $ret ? [true, null] : [false, $error];
    }

    public function config(array $config)
    {
        $this->id = isset($config['ID']) ? $config['ID'] : 0;
        $this->token = isset($config['Token']) ? $config['Token'] : null;

        $this->params['login_token'] = $this->id . ',' . $this->token;
        $this->params['format'] = "json";
        $this->params['lang'] = "cn";
        $this->params['error_on_empty'] = "yes";
    }

    public function configInfo()
    {
        return [
            [
                'name' => 'ID',
                'placeholder' => '?????????ID',
                'tips' => '<a href="https://support.dnspod.cn/Kb/showarticle/tsid/227/" target="_blank">??????????????????</a>'
            ],
            [
                'name' => 'Token',
                'placeholder' => '?????????Token',
                'tips' => ''
            ]
        ];
    }

    private function getResult($action, $params = [])
    {
        $parameter = array_merge($this->params, $params);

        list($res, $error) = $this->post($this->url . $action, [
            'body' => $this->buildParameter($parameter)
        ]);

        if (!$res) return [false, $error];

        $body = (string)$res->getBody();
        if ($ret = json_decode($body, true)) {
            if (isset($ret['status']['code'])) {
                if ($ret['status']['code'] == 1) {
                    return [$ret, null];
                } elseif (isset($ret['status']['message'])) {
                    return [false, $ret['status']['message']];
                }
            }
        }
        return [false, '??????????????????'];
    }

    private function buildParameter($params = [])
    {
        $array = array();
        foreach ($params as $k => $v) {
            $array[] = "$k=" . $v;
        }
        return implode('&', $array);
    }

}