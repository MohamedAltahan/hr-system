<?php

namespace Database\Seeders\TenantSeeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\System\Salary\SalaryStructure\Models\SalaryComponent;
use Modules\System\Salary\SalaryStructure\Models\SalaryStructure;
use Modules\System\Salary\SalaryStructure\Models\StructureComponent;

class SalaryStructureSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SalaryStructure::truncate();
        StructureComponent::truncate();
        SalaryComponent::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        SalaryStructure::upsert([
            [
                'name' => 'موظف',
                'slug' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'عامل',
                'slug' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مدير',
                'slug' => 'manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ], ['slug'], ['name', 'slug', 'created_at', 'updated_at']);

        SalaryComponent::upsert([
            [
                'name' => 'الراتب الاساسي',
                'slug' => 'basic_salary',
                'type' => 'allowance',
                'is_basic_salary' => true,
                'is_taxable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'بدل سكن',
                'slug' => 'housing_allowance',
                'type' => 'allowance',
                'is_basic_salary' => false,
                'is_taxable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'بدل موصلات',
                'slug' => 'transport_allowance',
                'type' => 'allowance',
                'is_basic_salary' => false,
                'is_taxable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'تأمين اجتماعي',
                'slug' => 'social_insurance',
                'type' => 'deduction',
                'is_basic_salary' => false,
                'is_taxable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ضريبة الدخل',
                'slug' => 'income_tax',
                'type' => 'deduction',
                'is_basic_salary' => false,
                'is_taxable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'خصومات الغياب',
                'slug' => 'absence_deductions',
                'type' => 'deduction',
                'is_basic_salary' => false,
                'is_taxable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'خصومات التاخيرات',
                'slug' => 'late_deductions',
                'type' => 'deduction',
                'is_basic_salary' => false,
                'is_taxable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'خصومات العقوبات',
                'slug' => 'punishments_deductions',
                'type' => 'deduction',
                'is_basic_salary' => false,
                'is_taxable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ], ['slug'], ['name', 'slug', 'type', 'is_basic_salary', 'is_taxable', 'created_at', 'updated_at']);

        $structure = SalaryStructure::where('slug', 'employee')->first();
        $basic = SalaryComponent::where('slug', 'basic_salary')->first();
        $housing = SalaryComponent::where('slug', 'housing_allowance')->first();
        $transport = SalaryComponent::where('slug', 'transport_allowance')->first();
        $insurance = SalaryComponent::where('slug', 'social_insurance')->first();
        $tax = SalaryComponent::where('slug', 'income_tax')->first();

        $absence = SalaryComponent::where('slug', 'absence_deductions')->first();
        $late = SalaryComponent::where('slug', 'late_deductions')->first();
        $punishments = SalaryComponent::where('slug', 'punishments_deductions')->first();

        StructureComponent::upsert(
            [
                [
                    'salary_structure_id' => $structure->id,
                    'salary_component_id' => $basic->id,
                    'value_type' => 'fixed',
                    'value' => 0, // basic comes from employee
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'salary_structure_id' => $structure->id,
                    'salary_component_id' => $housing->id,
                    'value_type' => 'percentage',
                    'value' => 20, // 20% of basic
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'salary_structure_id' => $structure->id,
                    'salary_component_id' => $transport->id,
                    'value_type' => 'fixed',
                    'value' => 500, // fixed amount
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'salary_structure_id' => $structure->id,
                    'salary_component_id' => $insurance->id,
                    'value_type' => 'fixed',
                    'value' => 250,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'salary_structure_id' => $structure->id,
                    'salary_component_id' => $tax->id,
                    'value_type' => 'percentage',
                    'value' => 10, // 10% of basic
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'salary_structure_id' => $structure->id,
                    'salary_component_id' => $absence->id,
                    'value_type' => 'system',
                    'value' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'salary_structure_id' => $structure->id,
                    'salary_component_id' => $late->id,
                    'value_type' => 'system',
                    'value' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'salary_structure_id' => $structure->id,
                    'salary_component_id' => $punishments->id,
                    'value_type' => 'system',
                    'value' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            ],
            ['salary_structure_id', 'salary_component_id', 'value_type', 'value'],
            ['salary_structure_id', 'salary_component_id', 'value_type', 'value', 'created_at', 'updated_at']
        );
    }
}
