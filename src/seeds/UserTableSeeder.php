<?php

use Illuminate\Database\Seeder;
use Ooglee\Domain\Entities\User\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tb_user')->delete();

        $user = new User();
        
        $user->first_name = "Otieno";
        $user->last_name = "Rowland";
        $user->username = "rowlandoti";
        $user->email = "rowlandotienoo@gmail.com";
        $user->password = "i82april";
        $user->phone = "+254710805009";
        $user->confirmation_code = "d2e9360d961cc58012115be09c91e739";
        $user->auth_token = "0d961ccd209c91e7e9be393658012115";
        $user->status = "CONFIRMED";
        $user->role = "CLIENT";
        $user->main_image = "profile.jpg";
        $user->main_image_alt = "Voluptas sunt qui libero cupiditate sequi";
        $user->you_tube_video_id = "http://youtube.com/v/c91e7e9";
        $user->biography = "Look me in the eyes, it's okay if your scared but so am I";
        $user->count_views = "50";
        
        $user->save();

        $user = new User();
        
        $user->first_name = "Aspie";
        $user->last_name = "Lagather";
        $user->username = "spiegather";
        $user->email = "spiegather@gmail.com";
        $user->password = "i82april";
        $user->phone = "+254715865012";
        $user->confirmation_code = "d2e9360d961cc58012115be09c91e739";
        $user->auth_token = "0d961ccd209c91e7e9be393658012115";
        $user->status = "CONFIRMED";
        $user->role = "CHEF";
        $user->main_image = "profile.jpg";
        $user->main_image_alt = "Voluptas sunt qui libero cupiditate sequi";
        $user->you_tube_video_id = "http://youtube.com/v/c91e7e9";
        $user->biography = "Forget not, this day";
        $user->count_views = "45";
        
        $user->save();
    }
}