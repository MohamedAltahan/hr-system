<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Modules\Erp\AccountTree\Models\AccountTree;

class AccountTreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // ---------------------------------------------------------------------------Root accounts
        $assets = AccountTree::firstOrCreate([
            'account_code' => 1,
        ], [
            'name_ar' => 'الأصول',
            'name_en' => 'Assets',
            'account_code' => 1,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        $liabilities = AccountTree::firstOrCreate([
            'account_code' => 2,
        ], [
            'name_ar' => 'الالتزامات',
            'name_en' => 'Liabilities',
            'account_code' => 2,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        $equity = AccountTree::firstOrCreate([
            'account_code' => 3,
        ], [
            'name_ar' => 'حقوق الملكية',
            'name_en' => 'Equity',
            'account_code' => 3,
            'account_nature' => 'credit',
            'account_category' => 3,
        ]);
        $income = AccountTree::firstOrCreate([
            'account_code' => 4,
        ], [
            'name_ar' => 'الإيرادات',
            'name_en' => 'Income',
            'account_code' => 4,
            'account_nature' => 'credit',
            'account_category' => 4,
        ]);
        $expenses = AccountTree::firstOrCreate([
            'account_code' => 5,
        ], [
            'name_ar' => 'المصروفات',
            'name_en' => 'Expenses',
            'account_code' => 5,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);

        // //======================================================================= 1.1 - Child accounts under fixed Assets
        $FixedAssets = AccountTree::firstOrCreate([
            'account_code' => 11,
        ], [
            'name_ar' => 'الأصول الثابتة',
            'name_en' => 'Fixed assets',
            'account_code' => 11,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $FixedAssets->parent_id) {
            $FixedAssets->appendToNode($assets)->save();
        }

        $lands = AccountTree::firstOrCreate([
            'account_code' => 111,
        ], [
            'name_ar' => 'الاارضى',
            'name_en' => 'Lands',
            'account_code' => 111,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $lands->parent_id) {
            $lands->appendToNode($FixedAssets)->save();
        }

        $buildings = AccountTree::firstOrCreate([
            'account_code' => 112,
        ], [
            'name_ar' => 'المبانى',
            'name_en' => 'Buildings',
            'account_code' => 112,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $buildings->parent_id) {
            $buildings->appendToNode($FixedAssets)->save();
        }

        $furniture = AccountTree::firstOrCreate([
            'account_code' => 113,
        ], [
            'name_ar' => 'الاثاث',
            'name_en' => 'Furniture',
            'account_code' => 113,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $furniture->parent_id) {
            $furniture->appendToNode($FixedAssets)->save();
        }

        $cars = AccountTree::firstOrCreate([
            'account_code' => 114,
        ], [
            'name_ar' => 'السيارات',
            'name_en' => 'Cars',
            'account_code' => 114,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $cars->parent_id) {
            $cars->appendToNode($FixedAssets)->save();
        }

        $machines = AccountTree::firstOrCreate([
            'account_code' => 115,
        ], [
            'name_ar' => 'الات',
            'name_en' => 'Machines',
            'account_code' => 115,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $machines->parent_id) {
            $machines->appendToNode($FixedAssets)->save();
        }

        $equipment = AccountTree::firstOrCreate([
            'account_code' => 116,
        ], [
            'name_ar' => 'معدات',
            'name_en' => 'Equipment',
            'account_code' => 116,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $equipment->parent_id) {
            $equipment->appendToNode($FixedAssets)->save();
        }

        // ---------------------------------------------------------------- 1.2 - Child accounts under Current Assets
        $currentAssets = AccountTree::firstOrCreate([
            'account_code' => 12,
        ], [
            'name_ar' => 'الاصول المتداولة',
            'name_en' => 'Current assets',
            'account_code' => 12,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $currentAssets->parent_id) {
            $currentAssets->appendToNode($assets)->save();
        }

        $treasury = AccountTree::firstOrCreate([
            'account_code' => 121,
        ], [
            'name_ar' => 'الصندوق',
            'name_en' => 'Treasury',
            'account_code' => 121,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $treasury->parent_id) {
            $treasury->appendToNode($currentAssets)->save();
        }

        $mainTreasury = AccountTree::firstOrCreate([
            'account_code' => 1211,
        ], [
            'name_ar' => 'الخزينة الرئيسية',
            'name_en' => 'Main treasury',
            'account_code' => 1211,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $mainTreasury->parent_id) {
            $mainTreasury->appendToNode($treasury)->save();
        }

        $bank = AccountTree::firstOrCreate([
            'account_code' => 122,
        ], [
            'name_ar' => 'البنك',
            'name_en' => 'The banks',
            'account_code' => 122,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $bank->parent_id) {
            $bank->appendToNode($currentAssets)->save();
        }

        $notesReceivable = AccountTree::firstOrCreate([
            'account_code' => 123,
        ], [
            'name_ar' => 'اوراق قبض',
            'name_en' => 'Notes receivable',
            'account_code' => 123,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $notesReceivable->parent_id) {
            $notesReceivable->appendToNode($currentAssets)->save();
        }

        $warehouses = AccountTree::firstOrCreate([
            'account_code' => 124,
        ], [
            'name_ar' => 'المخازن',
            'name_en' => 'Warehouses',
            'account_code' => 124,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $warehouses->parent_id) {
            $warehouses->appendToNode($currentAssets)->save();
        }

        $customers = AccountTree::firstOrCreate([
            'account_code' => 125,
        ], [
            'name_ar' => 'العملاء',
            'name_en' => 'Customers',
            'account_code' => 125,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $customers->parent_id) {
            $customers->appendToNode($currentAssets)->save();
        }

        $defaultCustomer = AccountTree::firstOrCreate([
            'account_code' => 1251,
        ], [
            'name_ar' => 'عميل افتراضي',
            'name_en' => 'Default customer',
            'account_code' => 1251,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $defaultCustomer->parent_id) {
            $defaultCustomer->appendToNode($customers)->save();
        }

        $accruedRevenues = AccountTree::firstOrCreate([
            'account_code' => 126,
        ], [
            'name_ar' => 'ايرادات مستحقه',
            'name_en' => 'Accrued revenues',
            'account_code' => 126,
            'account_nature' => 'debit',
            'account_category' => 1,
        ]);
        if (! $accruedRevenues->parent_id) {
            $accruedRevenues->appendToNode($currentAssets)->save();
        }

        // // ============================================================ 2.1 - Child accounts under Current liabilities
        $currentLiabilities = AccountTree::firstOrCreate([
            'account_code' => 21,
        ], [
            'name_ar' => 'الالتزامات المتداولة',
            'name_en' => 'Current liabilities',
            'account_code' => 21,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $currentLiabilities->parent_id) {
            $currentLiabilities->appendToNode($liabilities)->save();
        }

        $accountsPayable = AccountTree::firstOrCreate([
            'account_code' => 211,
        ], [
            'name_ar' => 'الحسابات الدائنة',
            'name_en' => 'Accounts payable',
            'account_code' => 211,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $accountsPayable->parent_id) {
            $accountsPayable->appendToNode($currentLiabilities)->save();
        }

        $otherCreditors = AccountTree::firstOrCreate([
            'account_code' => 2111,
        ], [
            'name_ar' => 'دائنون متنوعون',
            'name_en' => 'Other creditors',
            'account_code' => 2111,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $otherCreditors->parent_id) {
            $otherCreditors->appendToNode($currentLiabilities)->save();
        }

        $suppliers = AccountTree::firstOrCreate([
            'account_code' => 2112,
        ], [
            'name_ar' => 'الموردون',
            'name_en' => 'supplier',
            'account_code' => 2112,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $suppliers->parent_id) {
            $suppliers->appendToNode($accountsPayable)->save();
        }

        $defaultSupplier = AccountTree::firstOrCreate([
            'account_code' => 21121,
        ], [
            'name_ar' => 'مورد افتراضي',
            'name_en' => 'Default supplier',
            'account_code' => 21121,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $defaultSupplier->parent_id) {
            $defaultSupplier->appendToNode($suppliers)->save();
        }

        $shortTtermLoans = AccountTree::firstOrCreate([
            'account_code' => 2113,
        ], [
            'name_ar' => 'قروض قصيرة الاجل',
            'name_en' => 'Short-term loans',
            'account_code' => 2113,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $shortTtermLoans->parent_id) {
            $shortTtermLoans->appendToNode($accountsPayable)->save();
        }

        $notesPayable = AccountTree::firstOrCreate([
            'account_code' => 2114,
        ], [
            'name_ar' => 'أوراق الدفع',
            'name_en' => 'Notes payable',
            'account_code' => 2114,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $notesPayable->parent_id) {
            $notesPayable->appendToNode($accountsPayable)->save();
        }

        $revenueReceivedInAdvance = AccountTree::firstOrCreate([
            'account_code' => 2116,
        ], [
            'name_ar' => 'ايرادات مقبوضه مقدما',
            'name_en' => 'Revenue received in advance',
            'account_code' => 2116,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $revenueReceivedInAdvance->parent_id) {
            $revenueReceivedInAdvance->appendToNode($accountsPayable)->save();
        }

        // ------------------------------------------------------------------- 2.2 Child accounts under Current liabilities
        $longTermLiabilities = AccountTree::firstOrCreate([
            'account_code' => 22,
        ], [
            'name_ar' => 'الالتزامات طويلة الاجل',
            'name_en' => 'Long-term Liabilities',
            'account_code' => 22,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $longTermLiabilities->parent_id) {
            $longTermLiabilities->appendToNode($liabilities)->save();
        }

        $longTermLoans = AccountTree::firstOrCreate([
            'account_code' => 221,
        ], [
            'name_ar' => 'قروض طويلة الاجل',
            'name_en' => 'Long-term loans',
            'account_code' => 221,
            'account_nature' => 'credit',
            'account_category' => 2,
        ]);
        if (! $longTermLoans->parent_id) {
            $longTermLoans->appendToNode($longTermLiabilities)->save();
        }

        // // ==================================================================== 3.1 - Child accounts under equity
        $capital = AccountTree::firstOrCreate([
            'account_code' => 31,
        ], [
            'name_ar' => 'رأس المال',
            'name_en' => 'Capital',
            'account_code' => 31,
            'account_nature' => 'credit',
            'account_category' => 3,
        ]);
        if (! $capital->parent_id) {
            $capital->appendToNode($equity)->save();
        }

        $ownerDrawings = AccountTree::firstOrCreate([
            'account_code' => 32,
        ], [
            'name_ar' => 'المسحوبات الشخصيه',
            'name_en' => 'Owner drawings',
            'account_code' => 32,
            'account_nature' => 'credit',
            'account_category' => 3,
        ]);
        if (! $ownerDrawings->parent_id) {
            $ownerDrawings->appendToNode($equity)->save();
        }

        $ownerCurrentAccount = AccountTree::firstOrCreate([
            'account_code' => 33,
        ], [
            'name_ar' => 'جار ي صاحب الشركة',
            'name_en' => 'Owner current account',
            'account_code' => 33,
            'account_nature' => 'credit',
            'account_category' => 3,
        ]);
        if (! $ownerCurrentAccount->parent_id) {
            $ownerCurrentAccount->appendToNode($equity)->save();
        }

        $reserves = AccountTree::firstOrCreate([
            'account_code' => 34,
        ], [
            'name_ar' => 'الاحتياطات',
            'name_en' => 'Reserves',
            'account_code' => 34,
            'account_nature' => 'credit',
            'account_category' => 3,
        ]);
        if (! $reserves->parent_id) {
            $reserves->appendToNode($equity)->save();
        }

        $retainedEarnings = AccountTree::firstOrCreate([
            'account_code' => 35,
        ], [
            'name_ar' => 'الارباح المحتجزه',
            'name_en' => 'Retained earnings',
            'account_code' => 35,
            'account_nature' => 'credit',
            'account_category' => 3,
        ]);
        if (! $retainedEarnings->parent_id) {
            $retainedEarnings->appendToNode($equity)->save();
        }

        // ==================================================================== 4.1 - Child accounts under Income
        $mainActivityRevenue = AccountTree::firstOrCreate([
            'account_code' => 41,
        ], [
            'name_ar' => 'ايرادات النشاط الرئيسي',
            'name_en' => 'Main activity revenue',
            'account_code' => 41,
            'account_nature' => 'credit',
            'account_category' => 4,
        ]);
        if (! $mainActivityRevenue->parent_id) {
            $mainActivityRevenue->appendToNode($income)->save();
        }

        $sales = AccountTree::firstOrCreate([
            'account_code' => 411,
        ], [
            'name_ar' => 'المبيعات',
            'name_en' => 'Sales',
            'account_code' => 411,
            'account_nature' => 'credit',
            'account_category' => 4,
        ]);
        if (! $sales->parent_id) {
            $sales->appendToNode($mainActivityRevenue)->save();
        }

        $salesRefund = AccountTree::firstOrCreate([
            'account_code' => 412,
        ], [
            'name_ar' => 'مردودات المبيعات',
            'name_en' => 'Sales refund',
            'account_code' => 412,
            'account_nature' => 'debit',
            'account_category' => 4,
        ]);
        if (! $salesRefund->parent_id) {
            $salesRefund->appendToNode($mainActivityRevenue)->save();
        }

        $discountOnSales = AccountTree::firstOrCreate([
            'account_code' => 413,
        ], [
            'name_ar' => 'الخصم علي المبيعات',
            'name_en' => 'Discount on sales',
            'account_code' => 413,
            'account_nature' => 'debit',
            'account_category' => 4,
        ]);
        if (! $discountOnSales->parent_id) {
            $discountOnSales->appendToNode($mainActivityRevenue)->save();
        }

        $salesTax = AccountTree::firstOrCreate([
            'account_code' => 414,
        ], [
            'name_ar' => 'ضريبة.ق.م مبيعات',
            'name_en' => 'Sales tax',
            'account_code' => 414,
            'account_nature' => 'credit',
            'account_category' => 4,
        ]);
        if (! $salesTax->parent_id) {
            $salesTax->appendToNode($mainActivityRevenue)->save();
        }

        // ----------------------------------------------------------------------------------------------
        $otherIncome = AccountTree::firstOrCreate([
            'account_code' => 42,
        ], [
            'name_ar' => 'ايرادات اخرى',
            'name_en' => 'Other income',
            'account_code' => 42,
            'account_nature' => 'credit',
            'account_category' => 4,
        ]);
        if (! $otherIncome->parent_id) {
            $otherIncome->appendToNode($income)->save();
        }

        $investmentRevenue = AccountTree::firstOrCreate([
            'account_code' => 421,
        ], [
            'name_ar' => 'ايرادات الاستثمار',
            'name_en' => 'Investment revenue',
            'account_code' => 421,
            'account_nature' => 'credit',
            'account_category' => 4,
        ]);
        if (! $investmentRevenue->parent_id) {
            $investmentRevenue->appendToNode($otherIncome)->save();
        }

        $rentalIncome = AccountTree::firstOrCreate([
            'account_code' => 422,
        ], [
            'name_ar' => 'ايرادات الايجار',
            'name_en' => 'Rental income',
            'account_code' => 422,
            'account_nature' => 'credit',
            'account_category' => 4,
        ]);
        if (! $rentalIncome->parent_id) {
            $rentalIncome->appendToNode($otherIncome)->save();
        }

        // ==================================================================== 5.1 - Child accounts under Expenses

        $saleCost = AccountTree::firstOrCreate([
            'account_code' => 51,
        ], [
            'name_ar' => 'تكلفة المبيعات',
            'name_en' => 'Sales cost',
            'account_code' => 51,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $saleCost->parent_id) {
            $saleCost->appendToNode($expenses)->save();
        }

        $purchases = AccountTree::firstOrCreate([
            'account_code' => 511,
        ], [
            'name_ar' => 'المشتريات',
            'name_en' => 'Purchases',
            'account_code' => 511,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $purchases->parent_id) {
            $purchases->appendToNode($saleCost)->save();
        }

        $purchasesCost = AccountTree::firstOrCreate([
            'account_code' => 512,
        ], [
            'name_ar' => 'مصاريف المشتريات',
            'name_en' => 'Purchases cost',
            'account_code' => 512,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $purchasesCost->parent_id) {
            $purchasesCost->appendToNode($saleCost)->save();
        }

        $purchaseReturn = AccountTree::firstOrCreate([
            'account_code' => 513,
        ], [
            'name_ar' => 'مردودات المشتريات',
            'name_en' => 'Purchase returns',
            'account_code' => 513,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $purchaseReturn->parent_id) {
            $purchaseReturn->appendToNode($saleCost)->save();
        }

        $purchaseDiscount = AccountTree::firstOrCreate([
            'account_code' => 514,
        ], [
            'name_ar' => 'الخصم على المشتريات',
            'name_en' => 'Purchase discount',
            'account_code' => 514,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $purchaseDiscount->parent_id) {
            $purchaseDiscount->appendToNode($saleCost)->save();
        }

        $purchaseTax = AccountTree::firstOrCreate([
            'account_code' => 515,
        ], [
            'name_ar' => 'ضريبة.ق.م مشتريات',
            'name_en' => 'Purchase tax',
            'account_code' => 515,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $purchaseTax->parent_id) {
            $purchaseTax->appendToNode($saleCost)->save();
        }

        // -----------------------------------------------------------------------------------------------

        $sellingAndMarketingExpenses = AccountTree::firstOrCreate([
            'account_code' => 52,
        ], [
            'name_ar' => 'مصاريف البيع والتسويق',
            'name_en' => 'Selling and marketing expenses',
            'account_code' => 52,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $sellingAndMarketingExpenses->parent_id) {
            $sellingAndMarketingExpenses->appendToNode($expenses)->save();
        }

        $saleExpenses = AccountTree::firstOrCreate([
            'account_code' => 521,
        ], [
            'name_ar' => 'مصاريف المبيعات',
            'name_en' => 'Sale expenses',
            'account_code' => 521,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $saleExpenses->parent_id) {
            $saleExpenses->appendToNode($sellingAndMarketingExpenses)->save();
        }

        $saleCommissions = AccountTree::firstOrCreate([
            'account_code' => 522,
        ], [
            'name_ar' => 'عمولات بيع',
            'name_en' => 'Sale commissions',
            'account_code' => 522,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $saleCommissions->parent_id) {
            $saleCommissions->appendToNode($sellingAndMarketingExpenses)->save();
        }

        $advertising = AccountTree::firstOrCreate([
            'account_code' => 523,
        ], [
            'name_ar' => 'دعاية واعلان',
            'name_en' => 'Advertising',
            'account_code' => 523,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $advertising->parent_id) {
            $advertising->appendToNode($sellingAndMarketingExpenses)->save();
        }

        // --------------------------------------------------------------------------------------------------------
        $genralAndAdministrativeExpenses = AccountTree::firstOrCreate([
            'account_code' => 53,
        ], [
            'name_ar' => 'مصاريف ادارية وعمومية',
            'name_en' => 'General and administrative expenses',
            'account_code' => 53,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $genralAndAdministrativeExpenses->parent_id) {
            $genralAndAdministrativeExpenses->appendToNode($expenses)->save();
        }

        $salaries = AccountTree::firstOrCreate([
            'account_code' => 531,
        ], [
            'name_ar' => 'رواتب',
            'name_en' => 'Salaries',
            'account_code' => 531,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $salaries->parent_id) {
            $salaries->appendToNode($genralAndAdministrativeExpenses)->save();
        }

        $rent = AccountTree::firstOrCreate([
            'account_code' => 532,
        ], [
            'name_ar' => 'ايجار',
            'name_en' => 'Rent',
            'account_code' => 532,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $rent->parent_id) {
            $rent->appendToNode($genralAndAdministrativeExpenses)->save();
        }

        $maintenance = AccountTree::firstOrCreate([
            'account_code' => 533,
        ], [
            'name_ar' => 'صيانة',
            'name_en' => 'Maintenance',
            'account_code' => 533,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $maintenance->parent_id) {
            $maintenance->appendToNode($genralAndAdministrativeExpenses)->save();
        }

        $phoneAndInternet = AccountTree::firstOrCreate([
            'account_code' => 534,
        ], [
            'name_ar' => 'هاتف وانترنت',
            'name_en' => 'Phone and internet',
            'account_code' => 534,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $phoneAndInternet->parent_id) {
            $phoneAndInternet->appendToNode($genralAndAdministrativeExpenses)->save();
        }

        $electricity = AccountTree::firstOrCreate([
            'account_code' => 535,
        ], [
            'name_ar' => 'كهرباء',
            'name_en' => 'Electricity',
            'account_code' => 535,
            'account_nature' => 'debit',
            'account_category' => 5,
        ]);
        if (! $electricity->parent_id) {
            $electricity->appendToNode($genralAndAdministrativeExpenses)->save();
        }
    }
}
