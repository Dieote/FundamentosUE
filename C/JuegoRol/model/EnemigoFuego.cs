class EnemigoFuego : Enemigo{
//no hereda privates ni constructores

    public int nivelFuego { get; set; }
    public string poderFuego { get; set; }
                                                                                         //con esto se llama al constructor padre                   
public EnemigoFuego(string nombre, int vida, int nivel, Perfil perfil, int nivelFuego, string poderFuego) 
: base(nombre, vida, nivel, perfil){ 
this.nivelFuego = nivelFuego;
this.poderFuego = poderFuego;
}

/*                                 // Da igual que le ponga vida y nivel, no los va a usar, usa constructor con nombre
public EnemigoFuego(string nombre, int vida, int nivel, int nivelFuego, string poderFuego) : base(nombre){ 
this.nivelFuego = nivelFuego;
this.poderFuego = poderFuego;
}
*/

public EnemigoFuego(string nombre, int nivelFuego, string poderFuego) : base(nombre){ 
this.nivelFuego = nivelFuego;
this.poderFuego = poderFuego;
}

public override void MostrarDatos(){
        base.MostrarDatos();
        Console.WriteLine("El poder de fuego es " + poderFuego);
        Console.WriteLine("El nivel de fuego es " + nivelFuego);
}

    public override void realizarAtaque(){
        Console.WriteLine("El enemigo ataca con fuego" + poderFuego);
    }

public void realizarSanacionFuego(){
    Console.WriteLine("El enemigo se cura con fuego");
    vida += 10;
    }

}