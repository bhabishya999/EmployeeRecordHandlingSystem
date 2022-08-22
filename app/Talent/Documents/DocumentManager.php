<?php
namespace App\Talent\Documents;
use App\Talent\Documents\Model\Document;

class DocumentManager
{
    public function __construct(private Document $document)
    {

    }
      
    public function store(array $documentArray):Document{
        $document=$this->document->create($documentArray);
        return $document;
    }
}
