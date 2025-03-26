//Calase base del resto de los elementos --> Superclase
abstract class Enemigo {
    private int nivel = 0;
    public string nombre  { get; set;}
    public int vida { get; set;}
    public int poder { get; set;}
    public Perfil perfil { get; set;}

    public Enemigo(){}

    public Enemigo(string nombre, int vida, int poder, int nivel, Perfil perfil){
        this.nombre = nombre;
        this.vida = vida;
        this.poder = poder;
        this.nivel = nivel;
        this.perfil = perfil;
    }
    public Enemigo(string nombre, int vida, int poder, Perfil perfil){
        this.nombre = nombre;
        this.vida = vida;
        this.poder = poder;
        this.perfil = perfil;
    }

    public Enemigo(string nombre){
        this.nombre = nombre;
        vida = 100;
        poder = 150;
    }

    public Enemigo(string nombre, int vida, int nivel) : this(nombre){
        this.vida = vida;
        this.nivel = nivel;
    }

    public virtual void MostrarDatos(){
        Console.WriteLine("El enemigo es " + nombre + " - Su perfil: " + perfil.Nombre);
        Console.WriteLine("Nivel de poder: " + poder + " / Vida: " + vida);
        Console.WriteLine("Modificador de ataque por perfil: ");
        Console.WriteLine(" Daño: " + perfil.nivelDanio + " / Defensa: " + perfil.nivelDefensa);
    }

    public abstract void realizarAtaque();
        





}