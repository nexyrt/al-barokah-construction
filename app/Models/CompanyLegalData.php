<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLegalData extends Model
{
    use HasFactory;

    protected $table = 'company_legal_data';

    protected $fillable = [
        'nib',
        'siujk',
        'tdp',
        'akta_pendirian',
        'sk_kemenkumham',
        'domisili_usaha',
        'certifications',
        'awards',
        'board_of_commissioners',
        'board_of_directors',
        'management_team',
    ];

    protected $casts = [
        'certifications' => 'array',
        'awards' => 'array',
        'board_of_commissioners' => 'array',
        'board_of_directors' => 'array',
        'management_team' => 'array',
    ];

    /**
     * Get certifications grouped by type
     */
    public function getCertificationsByType(): array
    {
        $certifications = $this->certifications ?? [];

        $grouped = [
            'ISO' => [],
            'K3' => [],
            'SBU' => [],
            'Other' => [],
        ];

        foreach ($certifications as $cert) {
            $type = $cert['type'] ?? 'Other';
            if (isset($grouped[$type])) {
                $grouped[$type][] = $cert;
            } else {
                $grouped['Other'][] = $cert;
            }
        }

        return $grouped;
    }

    /**
     * Get active (non-expired) certifications
     */
    public function getActiveCertifications(): array
    {
        $certifications = $this->certifications ?? [];
        $now = now();

        return array_filter($certifications, function ($cert) use ($now) {
            if (!isset($cert['expired_date'])) {
                return true;
            }
            return \Carbon\Carbon::parse($cert['expired_date'])->isFuture();
        });
    }

    /**
     * Get awards sorted by year (descending)
     */
    public function getSortedAwards(): array
    {
        $awards = $this->awards ?? [];

        usort($awards, function ($a, $b) {
            return ($b['year'] ?? 0) - ($a['year'] ?? 0);
        });

        return $awards;
    }
}