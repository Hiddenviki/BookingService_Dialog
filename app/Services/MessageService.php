<?php

 namespace App\Services;

 use App\Http\Requests\MessageRequest;
 use App\Models\Message;
 use App\Repositories\DialogRepository;
 use App\Repositories\MessageRepository;
 use Carbon\Carbon;
 use GuzzleHttp\Client;
 use Illuminate\Database\Eloquent\Collection;
 use Mockery\Exception;

 final class MessageService
 {
     public function __construct(
         private readonly MessageRepository $messageRepository,
         private readonly DialogRepository  $dialogRepository,
     )
     {

     }

     public function create(MessageRequest $request): ?Message
     {
         $dialog = $this->dialogRepository->getById($request->input('dialog_id'));

         $accommodation = $this->getAccommodationByLandlordId($dialog->landlord_id);
         $accommodationObject = json_decode(json_decode($accommodation));

         $client = new Client(['base_uri' => 'http://booking-service.loc']);
         $response = $client->get('api/booking/get', [
             'query' => ['accommodation_id' => $accommodationObject->id, 'tenant_id' => $dialog->tenant_id],
         ]);

         $status = json_decode(json_decode($response->getBody(), true));

         $request->merge(['status' => $status->booking_status]);
         $request->merge(['date' => Carbon::now()]);

         return $this->messageRepository->create($request);
     }

     public function getAllMessagesByDialogId(int $id): ?Collection
     {
         $result = $this->messageRepository->getAllMessagesByDialogId($id);

         return $result ? $result : null;
     }

     private function getAccommodationByLandlordId(int $id): string
     {
         $client = new Client(['base_uri' => 'http://accommodation-service.loc']);
         $response = $client->get('api/accommodation/get/' . $id);

         return $response->getBody();
     }
 }
