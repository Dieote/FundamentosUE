class EnemigoAgua : Enemigo{
//no hereda privates ni constructores

    public int nivelAgua { get; set; }

    public string poderAgua { get; set; }
                                                                                         //con esto se llama al constructor padre                   
public EnemigoAgua(){}
public EnemigoAgua(string nombre, int vida, int nivel, Perfil perfil, int nivelAgua, string poderAgua) 
: base(nombre, vida, nivel, perfil){ 
this.nivelAgua = nivelAgua;
this.poderAgua = poderAgua;
}

public EnemigoAgua(string nombre, int nivelAgua, string poderAgua) : base(nombre){ 
this.nivelAgua = nivelAgua;
this.poderAgua = poderAgua;
}


public override void MostrarDatos(){
    base.MostrarDatos();
    Console.WriteLine("El poder de agua es " + poderAgua);
    Console.WriteLine("El nivel de agua es " + nivelAgua);
}

    public override void realizarAtaque(){
        Console.WriteLine("El enemigo ataca con agua" + poderAgua);
    }

    public void realizarSanacionAgua(){
        Console.WriteLine("El enemigo se cura con agua");
        vida += 10;
    }
}