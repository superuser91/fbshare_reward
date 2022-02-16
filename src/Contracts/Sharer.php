<?php

namespace Vgplay\FbShareReward\Contracts;

interface Sharer
{
    public function claimFbShareReward();
    public function getLastShare();
    public function getShareCount();
    public function updateShareCount(): bool;
    public function getMaxShareCount(): int;
}
