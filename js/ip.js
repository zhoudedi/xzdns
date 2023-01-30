async function loadResortName() {
      const response = await fetch('https://ip.useragentinfo.com/json',{
            headers: {
                //'Accept': 'application/json'
            },
            dataType: "json",
      });
      const resortName = await response.json();
        console.log("在id=ip的标签输出ip与地址、id=ipwz的标签输出IP位置");
        console.log(resortName);
        document.getElementById('ip').innerHTML = resortName.ip;
        document.getElementById('ipwz').innerHTML = resortName.province;
      }
      loadResortName();

/*使用：
1、导入js文件    <script src='./ip.js'></script>
2、在html添加对应ID   您的IP：<span id="ip"></span> &nbsp; 位置：<span id="ipwz"></span>

*/