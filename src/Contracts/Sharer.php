<?php

namespace Vgplay\FbShareReward\Contracts;

interface Sharer
{
    public function claimFbShareReward();
    public function getShareCount();
    public function updateShareCount(): bool;
}
