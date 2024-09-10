<?php

namespace App\Mail;

use App\Models\EnquiryDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;
    public $product;
    public $seller;

    public function __construct(EnquiryDetail $enquiry, Product $product, User $seller)
    {
        $this->enquiry = $enquiry;
        $this->product = $product;
        $this->seller = $seller;
    }

    public function build()
    {
        return $this->view('emails.enquiry')
                    ->with([
                        'productName' => $this->product->name,
                        'productImage' => $this->product->image,
                        'quantity' => $this->enquiry->quantity,
                        'seller' => $this->seller,
                    ]);
    }





    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Enquiry Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
