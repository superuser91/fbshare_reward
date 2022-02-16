<?php

namespace Vgplay\FbShareReward\Actions;

use Illuminate\Support\Facades\DB;
use Vgplay\FbShareReward\Contracts\Sharer;
use Vgplay\FbShareReward\Exceptions\SocialSharedException;

class ClaimShareReward
{
    public function shareOnFacebook(Sharer $sharer)
    {
        if (!$this->isClaimable($sharer)) {
            throw new SocialSharedException();
        }

        return DB::transaction(function () use ($sharer) {
            $sharer->updateShareCount();
            return $sharer->claimFbShareReward();
        });
    }

    protected function isClaimable(Sharer $sharer)
    {
        return empty($sharer->getLastShare())
            || $sharer->getShareCount() < (int) setting('site_max_share_count', $sharer->getMaxShareCount())
            || !now()->isSameDay($sharer->getLastShare());
    }
}
