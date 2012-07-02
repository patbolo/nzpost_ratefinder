<?php
class NZPostSiteConfig extends DataExtension {

    static $db = array(
		'PostOfficePostCode' => 'Int'
    );

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab("Root.NZPost", new NumericField("PostOfficePostCode", "Post office post code (from where items will be shipped)"));
    }
}