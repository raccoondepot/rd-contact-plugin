#
# Table structure for table 'tx_rdcontactplugin_domain_model_plugin'
#
CREATE TABLE tx_rdcontactplugin_domain_model_plugin (
	title varchar(255) DEFAULT '' NOT NULL,
    options int(11) DEFAULT '0' NOT NULL,
);

############################################################
### *** Attention ***
### tx_rdcontactplugin_domain_model_option should be equal
### to tx_rdcontactplugin_domain_model_alternativeoption
### by settings fields (not a system or relation fields)
############################################################

#
# Table structure for table 'tx_rdcontactplugin_domain_model_option'
#
CREATE TABLE tx_rdcontactplugin_domain_model_option (
    option_type varchar(255) DEFAULT '' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    icon_library varchar(255) DEFAULT '' NOT NULL,
    link varchar(255) DEFAULT '' NOT NULL,
    custom_link varchar(255) DEFAULT '' NOT NULL,
    embed text DEFAULT '' NOT NULL,
    plugin int(11) DEFAULT '0' NOT NULL,
    restrictions int(11) DEFAULT '0' NOT NULL,
    process_all_restrictions tinyint(1) unsigned DEFAULT '0' NOT NULL,
    content_elements int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_rdcontactplugin_domain_model_restriction'
#
CREATE TABLE tx_rdcontactplugin_domain_model_restriction (
    restriction_type varchar(255) DEFAULT '' NOT NULL,
    pages_respect text DEFAULT '' NOT NULL,
    http_referer varchar(255) DEFAULT '' NOT NULL,
    alternative_options int(11) DEFAULT '0' NOT NULL,
    option int(11) DEFAULT '0' NOT NULL,
    plugin int(11) DEFAULT '0' NOT NULL,
);

############################################################
### *** Attention ***
### tx_rdcontactplugin_domain_model_option should be equal
### to tx_rdcontactplugin_domain_model_alternativeoption
### by settings fields (not a system or relation fields)
############################################################

#
# Table structure for table 'tx_rdcontactplugin_domain_model_alternativeoption'
#
CREATE TABLE tx_rdcontactplugin_domain_model_alternativeoption (
    option_type varchar(255) DEFAULT '' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    icon_library varchar(255) DEFAULT '' NOT NULL,
    link varchar(255) DEFAULT '' NOT NULL,
    custom_link varchar(255) DEFAULT '' NOT NULL,
    embed text DEFAULT '' NOT NULL,
    restriction int(11) DEFAULT '0' NOT NULL,
    plugin int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_rdcontactplugin_related_option int(11) DEFAULT '0' NOT NULL,
	KEY index_rdcontactplugincontent (tx_rdcontactplugin_related_option)
);