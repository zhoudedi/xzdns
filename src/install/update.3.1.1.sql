ALTER TABLE `xzdns_domain_records`
ADD COLUMN `checked_at`  int(10) UNSIGNED NOT NULL DEFAULT 0 AFTER `updated_at`;
ALTER TABLE `xzdns_domain_records`
ADD INDEX (`checked_at`) ;
ALTER TABLE `xzdns_domains`
ADD COLUMN `desc`  text NULL AFTER `point`;
