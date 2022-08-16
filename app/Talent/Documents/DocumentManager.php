<?php
namespace App\Talent\Documents;
use App\Models\Document;

class DocumentManager
{
    public function __construct(private Document $document)
    {

    }
      
    public function create(array $documentArray):Document{
        $document=$this->document->create($documentArray);
        return $document;
    }
}
