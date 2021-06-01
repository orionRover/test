<?php


namespace App\Services;

use App\GUID;
use App\Models\Item;


class ItemService
{
    /**
     * get/create uuid of id1 && id2
     * @param $id1
     * @param $id2
     * @return string
     * @throws \Exception
     */
    public function UUID($id1, $id2)
    {
        $item = Item::where('id1', $id1)
            ->where('id2', $id2)
            ->first();
        if ($item) {
            return $item->uuid;
        }

        $item = new Item();
        $item->id1 = $id1;
        $item->id2 = $id2;
        $item->uuid = GUID::v4();
        $item->save();
        return $item->uuid;
    }
}
