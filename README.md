<p align="center">
  <img src="https://res.cloudinary.com/bcwlyire/image/upload/v1785118882/NUEVO-LOGO-UPED-A-COLOR-scaled_szoqws.jpg" alt="Logo Universidad Pedagógica de El Salvador" width="400">
</p>

# Guía Práctica N.º 2: Programación Orientada a Objetos en PHP

Este repositorio contiene las prácticas correspondientes a la Semana 2 del curso Integración de Sistemas (CE-ISC019) de la Universidad Pedagógica de El Salvador "Dr. Luis Alonso Aparicio".

El proyecto aborda los fundamentos avanzados de la Programación Orientada a Objetos (POO) en PHP 8+ y la estructuración modular para el desarrollo del sistema integrador TaskBoard.

---

## Contenido de las Sesiones

### Día 1: Fundamentos de Clases y Objetos (Parte A)
* **Conceptos abordados:** Sintaxis básica de clases (`class`, `new`, `->`), encapsulamiento (`private`, `protected`), constructores y validación de datos mediante excepciones.
* **Ejercicios desarrollados:**
  * `A.1` Clase `Tarea` y `Usuario`
  * `A.2` Encapsulamiento con `Libro`
  * `A.3` Constructores y cálculo de antigüedad en `Vehiculo`
  * `A.4` Getters, setters y validación en `CuentaBancaria`
  * `A.5` Refactorización y aplicación de descuentos en `Producto`

### Día 2: Herencia, Interfaces y Namespaces (Parte B)
* **Conceptos abordados:** Reutilización mediante `extends` y `parent::`, composición de clases ("TIENE-UN"), contratos mediante `implements` (interfaces) y autoloading con Composer bajo el estándar PSR-4.
* **Ejercicios desarrollados:**
  * `B.1` Herencia con `Empleado` y `EmpleadoComision`
  * `B.2` Composición con `Biblioteca` y `Libro`
  * `B.3` Depuración y corrección de herencia con `Persona` y `Estudiante`
  * `B.4` Implementación de la interfaz `Imprimible` (`Factura` y `Recibo`)
  * `B.5` Autoloading con Composer, `App\Models` y `App\Contracts` (`ClienteVIP`, `Facturable`)

### Partes C y D: Ejercicios Integradores y TaskBoard (Moodle)
* Desarrollo de la arquitectura de objetos para el tablero Kanban utilizando clases como `Tablero`, `Columna`, `TareaUrgente`, `TareaRecurrente`, e interfaces polimórficas como `Notificable` y `Comentable`.
