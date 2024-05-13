<?php

namespace App\Http\Controllers;

use App\Http\Requests\DialogRequest;
use App\Services\DialogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DialogController extends BaseController
{
    public function __construct(private readonly DialogService $dialogService) {}

    public function create(DialogRequest $request): JsonResponse
    {
        $result = $this->dialogService->create($request);

        if (!$result) {
            return response()->json(['error' => 'Ошибка сохранения.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success' => 'Успешно сохранено.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function getByLandlordAndTenantIds(Request $request): JsonResponse
    {
        $result = $this->dialogService->getByLandlordAndTenantIds($request);

        if (!$result) {
            return response()->json(['error' => 'Ошибка получения диалога.'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json($result->toJson())->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

}

/*
 * Сделать так чтобы не было два одинаковых диалога.
 *
 * UUID
 *
 * Запрос который выводил бы лист всего жилья и не забронированных.
 * Запрос принимает boolean, если оно не принимает, то выводим все.
 * Если false, то выводим не занятые, если true.
 *
 * Сделать проверку чтобы юзер не мог писать левую диалог айди.
 *
 * Сообщение это в мессенджере.
 * Поменять status в messages на
 *
 * Убрать status из сообщений.
 *
 * В двух сервисах где бронирование и accommodation.
 *
 * От landlord_id при удалении заявки, отправлять сообщение.
 *
 *
 * В месседжах убираем статус.
 * Все id на uuid. Внешние ключи тоже uuid
 *
 * По датам добавить часы минуты и секунды.
 * Добавить UTC. Для Москвы.
 *
 * Не может быть что бронирование на одно и тоже жилье в статусе.
 *
 * Диалог никода не удаляется.
 * Если юзер снова будет бронировать, то диалог будет старым.
 */
