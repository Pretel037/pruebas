<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Crear la tabla users primero
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Crear la tabla certificados
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });

        // Crear la tabla user_certificados
        Schema::create('user_certificados', function (Blueprint $table) {
            $table->id(); // ID de la relación
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Clave foránea para usuarios
            $table->decimal('nota_final', 8, 2);
            $table->foreignId('certificado_id')->constrained('certificados')->onDelete('cascade'); // Clave foránea para certificados
            $table->date('fecha_obtencion')->nullable(); // Fecha en la que el usuario obtuvo el certificado
            $table->timestamps(); // Fechas de creación y actualización
        });

        // Continuar con la creación de otras tablas...
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // ID del curso
            $table->string('course_id')->unique(); // Código del curso
            $table->string('name'); // Nombre del curso
            $table->string('period'); // Período o semestre
            $table->string('session_link'); // Enlace a la sesión
            $table->text('description')->nullable(); // Descripción del curso (opcional)
            $table->timestamps(); // Fechas de creación y actualización
        });

        Schema::create('course_user', function (Blueprint $table) {
            $table->id(); // ID de la relación
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Relación con courses
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con users
            $table->timestamps(); // Fechas de creación y actualización
        });

        // Continuar con la creación de otras tablas...
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // ID del docente
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con la tabla users
            $table->string('first_name'); // Nombre del docente
            $table->string('last_name'); // Apellido del docente
            $table->string('dni')->unique(); // DNI del docente
            $table->date('birth_date'); // Fecha de nacimiento
            $table->string('subject')->nullable(); // Materia que enseña
            $table->string('address')->nullable(); // Dirección del docente
            $table->string('phone')->nullable(); // Teléfono del docente
            $table->string('profile_image')->nullable(); // URL de la imagen de perfil
            $table->timestamps(); // Fechas de creación y actualización
        });

        // Crear la tabla pagos_s_i_g_g_a_s primero
        Schema::create('pagos_s_i_g_g_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('numero_operacion');
            $table->string('nombres');
            $table->string('apellidos');
            $table->decimal('monto_pago', 8, 2);
            $table->dateTime('fecha_pago');
            $table->time('hora'); 
            $table->string('dni');
            $table->string('sucursal');
            $table->timestamps();
        });

        // Crear la tabla vouchers
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha'); // Fecha del voucher
            $table->time('hora'); // Hora del voucher
            $table->string('operacion'); // Número de operación
            $table->decimal('monto', 8, 2); // Monto del voucher
            $table->string('codigo_dni'); // Código de DNI
            $table->string('servicio'); // Servicio asociado al voucher
            $table->timestamps();
        });

        // Crear la tabla vouchers_validados
        Schema::create('vouchers_validados', function (Blueprint $table) {
            $table->id();
            $table->string('numero_operacion');
            $table->dateTime('fecha_pago');
            $table->decimal('monto', 8, 2);
            $table->string('dni_codigo');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nombre_curso_servicio');
            $table->boolean('estado')->default(false);
            $table->unsignedBigInteger('voucher_id'); // Clave foránea para vouchers
            $table->unsignedBigInteger('pagos_siga_id'); // Clave foránea para pagos

            $table->timestamps();
            
            // Definición de las claves foráneas
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
            $table->foreign('pagos_siga_id')->references('id')->on('pagos_s_i_g_g_a_s')->onDelete('cascade');
        });

        // Crear la tabla registros
        Schema::create('registros', function (Blueprint $table) {
            $table->id(); // ID del registro
            $table->string('nombres'); // Nombres del estudiante
            $table->string('apellidos'); // Apellidos del estudiante
            $table->string('dni')->unique(); // DNI del estudiante
            $table->string('celular'); // Celular del estudiante
            $table->integer('edad'); // Edad del estudiante
            $table->string('sexo'); // Sexo del estudiante
            $table->date('fecha_nacimiento'); // Fecha de nacimiento
            $table->timestamps(); // Fechas de creación y actualización
        });

        // Tabla matriculas
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id(); // ID de la matrícula
            $table->string('nombre'); // Nombre del curso o servicio
            $table->text('descripcion')->nullable(); // Descripción del curso
            $table->decimal('precio', 8, 2); // Precio de la matrícula
            $table->timestamps(); // Fechas de creación y actualización
        });

        // Crear la tabla matriculados
        Schema::create('matriculados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dni')->unique();
            $table->foreignId('registro_id')->constrained('registros')->onDelete('cascade');
            $table->foreignId('matricula_id')->constrained('matriculas')->onDelete('cascade');
            $table->foreignId('voucher_validado_id')->nullable()->constrained('vouchers_validados')->onDelete('cascade');
            
            // Clave foránea para users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matriculados');
        Schema::dropIfExists('matriculas');
        Schema::dropIfExists('vouchers_validados');
        Schema::dropIfExists('registros');
        Schema::dropIfExists('vouchers');
        Schema::dropIfExists('pagos_s_i_g_g_a_s');
        Schema::dropIfExists('course_user');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('user_certificados');
        Schema::dropIfExists('certificados');
        Schema::dropIfExists('users');
    }
};
