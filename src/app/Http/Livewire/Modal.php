<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Category;


class Modal extends Component
{
    public $showModal = false;
    public $selectedContact = null;
    public $contactId = null;

    public function openModal($contactId)
        {
            $this->selectedContact = Contact::with('category')->find($contactId);
            $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedContact = null;
    }

    public function deleteContact($contactId)
    {
        $contact = Contact::with('category')->find($contactId);
        $contact->delete();
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
