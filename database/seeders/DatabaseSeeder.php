<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Card;
use App\Models\Type;
use App\Models\Subtype;
use App\Models\User;
use App\Models\Income;
use App\Models\Source;
use App\Models\Expense;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Mutation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Zaky Imad',
            'email' => 'zakyimad@gmail.com',
            'password' => bcrypt('Tongkucing123'),
            'username' => 'zakyimad',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Zaky Imad',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'username' => 'user'
        ]);

        // User::factory(4)->create();

        Subtype::create([
            'name' => 'Makanan',
            'icon' => 'food-outline',
            'user_id' => '1'
        ]);

        Subtype::create([
            'name' => 'Kerja',
            'icon' => 'briefcase-outline',
            'user_id' => '1'
        ]);

        Subtype::create([
            'name' => 'Londri',
            'icon' => 'tumble-dryer',
            'user_id' => '1'
        ]);

        Subtype::create([
            'name' => 'Gadget',
            'icon' => 'devices',
            'user_id' => '1'
        ]);

        Subtype::create([
            'name' => 'Motor',
            'icon' => 'motorbike',
            'user_id' => '1'
        ]);

        Subtype::create([
            'name' => 'Hobi',
            'icon' => 'controller',
            'user_id' => '1'
        ]);

        Subtype::create([
            'name' => 'Pulsa & Kuota',
            'icon' => 'phone-in-talk',
            'user_id' => '1'
        ]);

        Subtype::create([
            'name' => 'Pakaian',
            'icon' => 'tshirt-crew-outline',
            'user_id' => '1'
        ]);

        Subtype::create([
            'name' => 'Lainnya',
            'icon' => 'gamepad-round-outline',
            'user_id' => '1'
        ]);

        Type::create([
            'name' => 'Needs',
            'color' => 'danger',
            'icon' => 'food',
            'percentage' => 0.4,
            'user_id' => '1'
        ]);

        Type::create([
            'name' => 'Wants',
            'color' => 'warning',
            'icon' => 'gift-open',
            'percentage' => 0.3,
            'user_id' => '1'
        ]);

        Type::create([
            'name' => 'Savings',
            'color' => 'info',
            'icon' => 'wallet-plus',
            'percentage' => 0.3,
            'user_id' => '1'
        ]);

        Card::create([
            'name' => 'Cash',
            'amount' => 60000,
            'color' => '#769E5C',
            'icon' => 'cash-multiple',
            'user_id' => '1'
        ]);

        Card::create([
            'name' => 'BRI',
            'amount' => 100000,
            'color' => '#08579F',
            'icon' => 'credit-card',
            'user_id' => '1'
        ]);

        Card::create([
            'name' => 'BSI',
            'amount' => 20000000,
            'color' => '#14A7A0',
            'icon' => 'credit-card',
            'user_id' => '1'
        ]);

        Card::create([
            'name' => 'Shopee Pay',
            'amount' => 50000,
            'color' => '#EF5334',
            'icon' => 'shopping-outline',
            'user_id' => '1'
        ]);

        Card::create([
            'name' => 'Dana',
            'amount' => 2000,
            'color' => '#118EEA',
            'icon' => 'panorama-horizontal',
            'user_id' => '1'
        ]);

        Card::create([
            'name' => 'Bibit',
            'amount' => 2000000,
            'color' => '#00AB6B',
            'icon' => 'sprout',
            'user_id' => '1'
        ]);

        Source::create([
            'name' => 'Gaji Pokok',
            'user_id' => '1'
        ]);

        Source::create([
            'name' => 'Tunjangan Kinerja',
            'user_id' => '1'
        ]);

        Source::create([
            'name' => 'Uang Makan',
            'user_id' => '1'
        ]);

        Source::create([
            'name' => 'Transfer',
            'user_id' => '1'
        ]);

        Source::create([
            'name' => 'Lain-lain',
            'user_id' => '1'
        ]);

        // Transaction::factory(10)->create();
        Expense::factory(150)->create();
        Income::factory(150)->create();
        Mutation::factory(150)->create();
    }
};
