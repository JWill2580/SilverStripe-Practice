<?php

namespace SSPractice;

use Page;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxSetField;



class ArticlePage extends Page
{
    //to add new fields to the SilverStripe CMS
    private static $db = [
        'Date' => 'Date',
        'Teaser' => 'Text',
        'Author' => 'Varchar',
        //Defined as $Date, $Teaser and $Author in Templates
        //Create with dev/build
    ];

    //a database that is not native to the page and can accessed from elsewhere
    private static $has_one = [
        'Photo' => Image::class,
        'Brochure' => File::class
    ];
    //Required to publish the files
    private static $owns = [
        'Photo',
        'Brochure',
    ];

    
    public function getCMSFields() 
    {
        //Get CMS fields from db(?)
        $fields = parent::getCMSFields();
        //Creates the field on the CMS
        $fields->addFieldToTab('Root.Main', DateField::create('Date','Date of article'),'content');   
        $fields->addFieldToTab('Root.Main', TextareaField::create('Teaser')
        ->setDescription('This is the summary that appears on the article list page.'),
        'Content'
        );
        $fields->addFieldToTab('Root.Main', TextField::create('Author','Author of article'),'content');


        //lesson 7
        $fields->addFieldToTab('Root.Attachments', UploadField::create('Photo'));
        $fields->addFieldToTab('Root.Attachments', $brochure = UploadField::create('Brochure','Travel brochure, optional (PDF only)'));
        
        $brochure
        ->setFolderName('travel-brochures') //handy so all files dont just go to assets/Uploads
        ->getValidator()->setAllowedExtensions(['pdf']);

        //Lesson 10
        $fields->addFieldToTab('Root.Categories', CheckboxSetField::create(
            'Categories',
            'Selected categories',
            $this->Parent()->Categories()->map('ID','Title')
        ));
        
        
        return $fields;
    }
    public function CategoriesList()
    {
        if($this->Categories()->exists()) {
            return implode(', ', $this->Categories()->column('Title'));
        }

        return null;
    }


}
