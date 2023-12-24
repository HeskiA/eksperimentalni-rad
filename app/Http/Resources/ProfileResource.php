<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Position;
use App\Models\Education;
use App\Models\ContactInfo;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $contInfo = ContactInfo::where('user_id', $this->id)->get();
        $cinfoObj = [];
        foreach($contInfo as $cInfo)
        {
            $cinfoObj[$cInfo->type] = $cInfo->url;
        }

        return [
            'user_id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'summary' => $this->summary,
            'region_id' => $this->region_id,
            'industry_id' => $this->industry_id,
            'positions' => Position::where('user_id', $this->id)->get(),
            'education' => Education::where('user_id', $this->id)->get(),
            'contact_info' => $cinfoObj,
        ];
    }
}
