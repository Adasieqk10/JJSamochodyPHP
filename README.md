# Projekt Sprzedaż Samochodów

Projekt na Strony i Aplikacje internetowe.   (nie pozdrawiam php)

## Strona napisana w:
- HTML
- PHP
- CSS
- JavaScript

## Zrzuty ekranu
- widok niezalogowanego użytkownika

  ![image](https://github.com/user-attachments/assets/277219eb-fbbc-4616-aecb-0544cd7dd91c)
  
- widok zalogowanego administratora

  ![image](https://github.com/user-attachments/assets/61780abc-020b-4c39-88ce-950219b137ec)

## Tworzenie bazy danych i dodanie przykładowych danych

```sql
CREATE DATABASE SprzedazSamochodow;
USE SprzedazSamochodw;

CREATE TABLE Laptopy (
id INT AUTO_INCREMENT PRIMARY KEY,
marka VARCHAR(100),
model VARCHAR(100),
cena DECIMAL(10,2),
klient VARCHAR(100),
data_sprzedazy DATE
);

INSERT INTO samochody (marka, model, cena, klient, data_sprzedazy) VALUES
('Porsche', '911 Carrera', 580000, 'Mariusz Woźniak', '2025-04-20'),
('Porsche', 'Taycan Turbo S', 750000, 'Alicja Piotrowska', '2025-04-21'),
('McLaren', '720S', 1200000, 'Łukasz Kwiatkowski', '2025-04-22'),
('McLaren', 'Artura', 950000, 'Natalia Szymańska', '2025-04-23'),
('Nissan', 'GT-R Nismo', 650000, 'Patryk Król', '2025-04-24'),
('Ferrari', '488 GTB', 1300000, 'Barbara Nowakowska', '2025-04-25'),
('Lamborghini', 'Huracán EVO', 1400000, 'Tomasz Pawlak', '2025-04-26'),
('Lamborghini', 'Aventador SVJ', 2200000, 'Olga Majewska', '2025-04-27'),
('Aston Martin', 'DB11', 1050000, 'Kamil Lis', '2025-04-28'),
('Maserati', 'MC20', 1100000, 'Renata Adamczyk', '2025-04-29');

```

Made by Adam Kurzawa
