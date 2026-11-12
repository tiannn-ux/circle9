<?php

namespace App\Policies;

use App\Models\FAQ;
use App\Models\User;

class FAQPolicy
{
    // Boleh mengubah data INI?
    public function update(User $user, FAQ $faq): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        // Editor hanya boleh mengubah artikel yang statusnya belum Published (Draft)
        return $user->hasRole('editor') && $faq->status !== 'Published';
    }

    // Boleh menghapus data INI?
    public function delete(User $user, FAQ $faq): bool
    {
        return $user->hasRole('admin');
    }
}