<?php

use App\Services\GumletService;

if (!function_exists('getAssetDetails')) {
    /**
     * Get asset details by asset ID.
     *
     * @param  string  $assetId
     * @return array|null
     */
    function getAssetDetails($assetId)
    {
        try {
            $gumletService = new GumletService();
            $assetDetails = $gumletService->getAssetDetails($assetId);

            if ($assetDetails) {
                return [
                    'title' => $assetDetails['title'] ?? 'No title available',
                    'description' => $assetDetails['description'] ?? 'No description available',
                    'duration' => $assetDetails['duration'] ?? 'No duration available',
                ];
            }

            return null;
        } catch (\Exception $e) {
            // Handle the exception (e.g., log the error)
            return null;
        }
    }
}


?>