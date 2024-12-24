import sys
import io
from sqlalchemy import create_engine
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker
from sqlalchemy import Column, String, Integer, Date

# Configuración de la base de datos
DATABASE_URL = "mysql+pymysql://root:@localhost:3306/colegio"
engine = create_engine(DATABASE_URL)
Base = declarative_base()
Session = sessionmaker(bind=engine)

# Configurar salida estándar para UTF-8
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

# Modelos de la base de datos
class Asistencia(Base):
    __tablename__ = 'asistencias'
    id = Column(Integer, primary_key=True)
    estudiante = Column(String(100))
    fecha = Column(Date)
    estado = Column(String(20))

class Nota(Base):
    __tablename__ = 'notas'
    id = Column(Integer, primary_key=True)
    estudiante = Column(String(100))
    materia = Column(String(100))
    calificacion = Column(Integer)

def chatbot_logic(user_message):
    user_message = user_message.lower()
    session = Session()

    if "hola" in user_message or "iniciar" in user_message:
        return "¡Hola! ¿En qué puedo ayudarte? 😊\nOpciones disponibles:\n1️⃣ Ver asistencias\n2️⃣ Ver notas\n3️⃣ Actividades del mes"

    elif "ver asistencias de" in user_message:
        nombre = user_message.split("ver asistencias de")[-1].strip()
        asistencias = session.query(Asistencia).filter(Asistencia.estudiante.like(f"%{nombre}%")).all()

        if not asistencias:
            return f"No encontré asistencias para el estudiante {nombre}."

        respuesta = f"Asistencias de {nombre}:\n"
        for asistencia in asistencias:
            respuesta += f"- {asistencia.fecha}: {asistencia.estado}\n"
        return respuesta

    elif "ver notas de" in user_message:
        nombre = user_message.split("ver notas de")[-1].strip()
        notas = session.query(Nota).filter(Nota.estudiante.like(f"%{nombre}%")).all()

        if not notas:
            return f"No encontré notas para el estudiante {nombre}."

        respuesta = f"Notas de {nombre}:\n"
        for nota in notas:
            respuesta += f"- {nota.materia}: {nota.calificacion}\n"
        return respuesta

    return "Lo siento, no entendí tu solicitud. Intenta algo como 'hola', 'iniciar'."

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Error: No se recibió ningún mensaje.")
        sys.exit(1)

    # Leer el mensaje del usuario desde el argumento
    user_message = sys.argv[1]
    response = chatbot_logic(user_message)

    # Imprime la respuesta asegurando codificación UTF-8
    print(response)
