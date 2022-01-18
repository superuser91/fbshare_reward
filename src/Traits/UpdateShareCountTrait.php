<?php

namespace Vgplay\FbShareReward\Traits;

trait UpdateShareCountTrait
{
    public function updateShareCount(): bool
    {
        if (now()->diffInDays($this->last_share) == 0) {
            return $this->increment('share_count', 1, ['last_share' => now()]);
        }

        return $this->update([
            'share_count' => 1,
            'last_share' => now()
        ]);
    }
}
