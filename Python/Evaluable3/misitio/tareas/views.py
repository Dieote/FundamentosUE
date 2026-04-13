from django.shortcuts import render

def inicio(request):
    tareas = [
        "Estudiar Python",
        "Hacer ejercicio",
        "Leer un libro"
    ]
    return render(request, "inicio.html", {"tareas": tareas})