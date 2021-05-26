<?php


namespace Enbit\GLS\Models;


class Incoterm
{
    /**
     * Clearance Charges, Tax and Duties are paid by the exporter - DDP
     */
    const DDP = 10;

    /**
     * Clearance Charges, Tax and Duties are paid by the importer - DAP
     */
    const DAP = 20;

    /**
     * Clearance Charges and Duties are paid by the exporter.
     * Taxes are paid by the importer.
     */
    const DDP_VAT_UNPAID = 30;

    /**
     * Clearance Charges are paid by the exporter.
     * Taxes and Duties are paid by the importer.
     */
    const DAP_CLEARED = 40;

    /**
     * Low value shipments which are not subject to taxes and duties.
     * Clearence paid by exporter - DDP In case of transit through an EU country, parcels can be cleared
     * for free EU circulation (German “Freischreibung”)
     */
    const DDP_NO_TAXES = 50;

    /**
     * Available for UK, in case UK becomes an EFTA country.
     */
    const DDU_EU = 12;

    const UNKNOWN_1 = 13;
    const UNKNOWN_2 = 18;
    const UNKNOWN_3 = 23;
}