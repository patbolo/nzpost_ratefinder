<?php
class NZPostSiteConfig extends DataObjectDecorator {

    function extraStatics() {
        return array(
            'db' => array(
				'PostOfficePostCode' => 'Int'
            )
        );
    }

    public function updateCMSFields(FieldSet $fields) {
        $fields->addFieldToTab("Root.NZPost", new NumericField("PostOfficePostCode", "Post office post code (from where items will be shipped)"));
    }
}