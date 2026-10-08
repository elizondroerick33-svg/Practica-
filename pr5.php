<?php
declare(strict_types=1);

/**
 * Clase base: Persona
 * Los atributos son "protected" para que las clases hijas puedan usarlos.
 */
class Persona
{
    protected string $nombre;
    protected string $apellido;

    public function __construct(string $nombre, string $apellido)
    {
        $this->nombre   = $nombre;
        $this->apellido = $apellido;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    /** Devuelve el HTML con los datos básicos (ya escapado). */
    public function mostrarDatos(): string
    {
        return '<p class="dato"><span class="etiqueta">Nombre</span>'
             . '<span class="valor">' . htmlspecialchars($this->getNombreCompleto()) . '</span></p>';
    }
}

/**
 * Clase hija: Estudiante
 */
class Estudiante extends Persona
{
    private string $cedula;
    private string $codigo;

    public function __construct(string $nombre, string $apellido, string $cedula, string $codigo)
    {
        parent::__construct($nombre, $apellido);
        $this->cedula = $cedula;
        $this->codigo = $codigo;
    }

    public function mostrarEstudiante(): string
    {
        return $this->mostrarDatos()
             . '<p class="dato"><span class="etiqueta">Cédula</span>'
             . '<span class="valor">' . htmlspecialchars($this->cedula) . '</span></p>'
             . '<p class="dato"><span class="etiqueta">Código</span>'
             . '<span class="valor">' . htmlspecialchars($this->codigo) . '</span></p>';
    }
}

/**
 * Clase hija: Docente
 */
class Docente extends Persona
{
    private string $codigoDocente;

    public function __construct(string $nombre, string $apellido, string $codigoDocente)
    {
        parent::__construct($nombre, $apellido);
        $this->codigoDocente = $codigoDocente;
    }

    public function mostrarDocente(): string
    {
        return $this->mostrarDatos()
             . '<p class="dato"><span class="etiqueta">Código docente</span>'
             . '<span class="valor">' . htmlspecialchars($this->codigoDocente) . '</span></p>';
    }
}

// ---------- Objetos ----------
$estudiante = new Estudiante('Erick', 'Elizondro', '8-1046-1786', 'EST001');
$docente    = new Docente('Irene', 'Fong', 'DOC001');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Herencia en PHP | Persona, Estudiante y Docente</title>
    <style>
        :root {
            --fondo: #1f1147;
            --fondo-2: #5b21b6;
            --texto: #1c2540;
            --suave: #6b7694;
            --blanco: #ffffff;
            --estudiante: #0e7490;
            --docente: #c2410c;
            --borde: #e6e9f2;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: "Segoe UI", system-ui, -apple-system, Arial, sans-serif;
            color: var(--texto);
            background: linear-gradient(135deg, var(--fondo), var(--fondo-2));
            padding: 48px 20px;
        }

        .contenedor { max-width: 900px; margin: 0 auto; }

        header { text-align: center; color: var(--blanco); margin-bottom: 36px; }
        header h1 { font-size: clamp(1.7rem, 4vw, 2.4rem); font-weight: 700; }
        header p  { margin-top: 8px; color: #e0d4fa; }

        .tarjetas {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .tarjeta {
            background: var(--blanco);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(0, 0, 0, .28);
        }

        .tarjeta-top {
            padding: 22px 26px;
            color: var(--blanco);
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .estudiante .tarjeta-top { background: var(--estudiante); }
        .docente    .tarjeta-top { background: var(--docente); }

        .avatar {
            width: 52px; height: 52px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .22);
            display: grid; place-items: center;
            font-size: 1.5rem;
        }

        .tarjeta-top h2 { font-size: 1.25rem; }
        .tarjeta-top small { opacity: .85; }

        .tarjeta-cuerpo { padding: 12px 26px 24px; }

        .dato {
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding: 14px 0;
            border-bottom: 1px solid var(--borde);
        }
        .dato:last-child { border-bottom: none; }

        .etiqueta { font-size: .8rem; color: var(--suave); }
        .valor    { font-size: 1.1rem; font-weight: 600; }

        footer {
            margin-top: 32px;
            text-align: center;
            color: #e0d4fa;
            font-size: .9rem;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <header>
            <h1>Herencia en PHP</h1>
            <p>Clase Persona → Estudiante y Docente</p>
        </header>

        <main class="tarjetas">
            <section class="tarjeta estudiante">
                <div class="tarjeta-top">
                    <div class="avatar">🎓</div>
                    <div>
                        <h2>Estudiante</h2>
                        <small>Clase hija de Persona</small>
                    </div>
                </div>
                <div class="tarjeta-cuerpo">
                    <?= $estudiante->mostrarEstudiante() ?>
                </div>
            </section>

            <section class="tarjeta docente">
                <div class="tarjeta-top">
                    <div class="avatar">👩‍🏫</div>
                    <div>
                        <h2>Docente</h2>
                        <small>Clase hija de Persona</small>
                    </div>
                </div>
                <div class="tarjeta-cuerpo">
                    <?= $docente->mostrarDocente() ?>
                </div>
            </section>
        </main>

        <footer>
            Trabajo realizado por Erick Elizondro · Profesora: Irene Fong
        </footer>
    </div>
</body>
</html>