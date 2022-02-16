<?php

namespace Vgplay\FbShareReward\Traits;

trait UpdateShareCountTrait
{
    public function updateShareCount(): bool
    {
        if (now()->isSameDay($this->last_share)) {
            return $this->increment('share_count', 1, ['last_share' => now()]);
        }

        return $this->update([
            'share_count' => 1,
            'last_share' => now()
        ]);
    }

    public function getLastShare()
    {
        return $this->last_share;
    }

    public function getShareCount()
    {
        return $this->share_count;
    }
}
