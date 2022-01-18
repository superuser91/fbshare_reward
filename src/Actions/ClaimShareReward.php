<?php

namespace Vgplay\FbShareReward\Actions;

use Vgplay\FbShareReward\Contracts\Sharer;
use Vgplay\FbShareReward\Exceptions\SocialSharedException;

class ClaimShareReward
{
    public function shareOnFacebook(Sharer $sharer)
    {
        if (!$this->isClaimable($sharer)) {
            throw new SocialSharedException();
        }

        $sharer->updateShareCount();

        return $sharer->claimFbShareReward();
    }

    protected function isClaimable(Sharer $user)
    {
        return empty($user->last_share)
            || $user->share_count < (int) setting('site_max_share_count', 1)
            || now()->diffInDays($user->last_share);
    }
}
