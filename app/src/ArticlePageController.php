<?php

namespace SSPractice;

use PageController;    
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;

class ArticlePageController extends PageController 
{

    private static $allowed_actions = [
        'CommentForm',
    ];

    public function ContactForm()
    {
        $myForm = Form::create(
            $controller,
            'ContactForm',
            FieldList::create(
                TextField::create('YourName','Your name'),
                TextareaField::create('YourComments','Your comments')
            ),
            FieldList::create(
                FormAction::create('sendContactForm','Submit')
            ),
            RequiredFields::create('YourName','YourComments')
        );
        return $myForm;
    }

    public function sendContactForm($data, $form)
    {
        $name = $data['YourName'];
        $message = $data['YourMessage'];
        if(strlen($message) < 10) {
            $form->addErrorMessage('YourMessage','Your message is too short','bad');
            return $this->redirectBack();
        }
        return $this->redirect('/some/success/url');
    }

    // Old comment form without that isnt a verbose
    /*public function CommentForm()
    {
        $form = Form::create(
            $this,
            __FUNCTION__,
            FieldList::create(
                TextField::create('Name','')
                ->setAttribute('placeholder', 'Name*'),
                EmailField::create('Email','')
                ->setAttribute('placeholder', 'Email*'),
                TextareaField::create('Comment','')
                ->setAttribute('placeholder', 'Comment*'),
            ),
            FieldList::create(
                FormAction::create('handleComment','Post Comment')
                ->setUseButtonTags(true)
                ->addExtraClass('btn btn-default-color btn-lg')
            ),
            RequiredFields::create('Name','Email','Comment')
        );

        $form->addExtraClass('form-style');

        return $form;
    }*/

    public function CommentForm()
    {
        $form = Form::create(
            $this,
            __FUNCTION__,
            FieldList::create(
                TextField::create('Name',''),
                EmailField::create('Email',''),
                TextareaField::create('Comment','')
            ),
            FieldList::create(
                FormAction::create('handleComment','Post Comment')
                    ->setUseButtonTag(true)
                    ->addExtraClass('btn btn-default-color btn-lg')
            ),
            RequiredFields::create('Name','Email','Comment')
        )
            ->addExtraClass('form-style');

        foreach($form->Fields() as $field) {
            $field->addExtraClass('form-control')
                ->setAttribute('placeholder', $field->getName().'*');
        }


        foreach($form->Fields() as $field) {
            $field->addExtraClass('form-control')
                ->setAttribute('placeholder', $field->getName().'*');
        }

        $data = $this->getRequest()->getSession()->get("FormData.{$form->getName()}.data");

        return $data ? $form->loadDataFrom($data) : $form;
    }

    public function handleComment($data, $form)
    {
        $session = $this->getRequest()->getSession();
        $session->set("FormData.{$form->getName()}.data", $data);

        $existing = $this->Comments()->filter([
            'Comment' => $data['Comment']
        ]);

        if($existing->exists() && strlen($data['Comment']) > 20) {
            $form->sessionMessage('That comment already exists! Spammer!','bad');

            return $this->redirectBack();
        }

        $comment = ArticleComment::create();
        $comment->ArticlePageID = $this->ID;
        $form->saveInto($comment);
        $comment->write();

        $session->clear("FormData.{$form->getName()}.data");
        $form->sessionMessage('Thanks for your comment!','good');

        return $this->redirectBack();
    }
}
