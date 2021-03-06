<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('status_areas', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('description', 100);
        $table->timestamps();
      });

      Schema::create('status_companies', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('description', 100);
        $table->timestamps();
      });

      Schema::create('status_users', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('description', 100);
        $table->timestamps();
      });

      Schema::create('companies', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('email', 100);
        $table->unsignedBigInteger('status_id');
        $table->foreign('status_id')
              ->references('id')->on('status_companies');
        $table->timestamps();
      });

      Schema::create('areas', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('description', 100);
        $table->unsignedBigInteger('company_id');
        $table->foreign('company_id')
              ->references('id')->on('companies');
        $table->unsignedBigInteger('status_id');
        $table->foreign('status_id')
              ->references('id')->on('status_areas');
        $table->timestamps();
      });

      Schema::create('users', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->unsignedInteger('role_id');
        $table->foreign('role_id')
              ->references('id')->on('roles');
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->unsignedBigInteger('area_id')->nullable();
        $table->foreign('area_id')
              ->references('id')->on('areas');
        $table->unsignedBigInteger('company_id')->nullable();
        $table->foreign('company_id')
              ->references('id')->on('companies');
        $table->unsignedBigInteger('status_id')->nullable();
        $table->foreign('status_id')
              ->references('id')->on('status_users');
        $table->rememberToken();
        $table->timestamps();
      });

      Schema::create('devices', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('description')->nullable();
          $table->integer('custom_id')->nullable();
          $table->string('location')->nullable();
          $table->timestamps();
          $table->unsignedBigInteger('area_id');
          $table->foreign('area_id')
                ->references('id')->on('areas');
      });

      Schema::create('records', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('string1')->nullable();
        $table->string('string2')->nullable();
        $table->string('string3')->nullable();
        $table->double('number1', 8, 2)->nullable();
        $table->double('number2', 8, 2)->nullable();
        $table->double('number3', 8, 2)->nullable();
        $table->integer('device_id');
        $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
        Schema::dropIfExists('users');
        Schema::dropIfExists('devices');
        Schema::dropIfExists('records');
     }
}


/*
#
INSERT INTO `my_database`.`roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('1', 'User', 'web', '2019-09-23 18:59:44', '2019-09-23 18:59:44');
INSERT INTO `my_database`.`roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('2', 'SuperAdmin', 'web', '2019-09-23 19:00:51', '2019-09-23 19:00:51');
INSERT INTO `my_database`.`roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('3', 'Admin', 'web', '2019-09-23 19:01:52', '2019-09-23 19:01:52');

INSERT INTO `my_database`.`users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES ('1', 'Christophe Palacios', 'cpalacios@10x.org', '$2y$10$Nl35ak2ahuqXXS87s1xGL.Yw3z5qrLeSjBXcAx6hM6IIVCyE5cW7.', '2019-09-05 22:03:02', '2019-09-05 22:03:02');
INSERT INTO `my_database`.`users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES ('2', 'Pablo', 'pispache@10x.org', '$2y$10$f80YRH8DyXetFPGPANQlyuOs6T2yQUeGM5m129d9mTcMzNANzX7hm', '2019-09-05 22:22:45', '2019-09-05 22:22:45');
INSERT INTO `my_database`.`users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('3', 'Nery alexis', 'norellanac@10x.org', '$2y$10$mMGnaObcK9VuJcmu1vq7refMPIwmM3NY9m/N/K5UlDjwrvl4JTpQ.', 'QVB907GcATkR4oM4j9RYHIh8JYeGMx8ePi9bSWzbYIzOCvclQqboyqv9f2gL', '2019-09-17 21:16:57', '2020-01-27 23:40:34');

INSERT INTO `my_database`.`devices` (`id`, `name`, `description`, `custom_id`, `location`, `created_at`, `updated_at`, `user_id`) VALUES ('1', 'Farmacenter 1', 'Dispositivo bodega Mayoristas', '1', 'Sección 2', '2019-09-23 21:58:58', '2020-01-23 21:13:01', '1');
INSERT INTO `my_database`.`devices` (`id`, `name`, `description`, `custom_id`, `location`, `created_at`, `updated_at`, `user_id`) VALUES ('2', 'Farmacenter 2.0', 'Dispositivo bodega 1', '2', 'Sección 2.1', '2019-09-23 22:02:44', '2019-09-23 22:37:29', '1');
INSERT INTO `my_database`.`devices` (`id`, `name`, `description`, `custom_id`, `location`, `created_at`, `updated_at`, `user_id`) VALUES ('3', 'Dynapro 1', 'Dynapro IoT', '1', 'Bodega1', '2019-09-23 22:17:31', '2019-09-23 22:17:31', '3');
INSERT INTO `my_database`.`devices` (`id`, `name`, `description`, `custom_id`, `location`, `created_at`, `updated_at`, `user_id`) VALUES ('4', 'Dynapro 2', 'Dynapro IoT', '2', 'Sección 2', '2019-09-23 22:18:38', '2019-09-23 22:18:38', '3');
INSERT INTO `my_database`.`devices` (`id`, `name`, `description`, `custom_id`, `location`, `created_at`, `updated_at`, `user_id`) VALUES ('5', 'Neoheticals Test', 'Dispositivo bodega', '1', 'Bodega', '2020-01-28 21:58:58', '2020-01-28 18:18:41', '4');


*/