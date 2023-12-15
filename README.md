# horaTrabalhada

## Cálculo básico de período de trabalho


```
public string $baseURL = 'http://local.horatrabalhada.com';
```
### Instalação XAMPP

```
Após baixar o arquivo, extrair-lo na pasta do servidor, alterar no
arquivo App/Config/App.php
```
```
Configurar virtual hosts windows: C:\Windows\System32\drivers\etc
adcionar linha:
127.0.0.1 local.horatrabalhada.com
```
## 1.

## 3.

## 2.

```
C:\xampp\apache\conf\extra\httpd-vhosts.conf adcionar:
```
```
2
```

```
Guia de Instalação máquina bitnami codeigniter 4
Guia instalação codeigniter 4 site oficial
```
```
diretório raíz do projeto & tabela bancohoras
```
### MySQL - Opcional

```
Importar também o SQL que está na raíz do
projeto,
-Caso não aconteça a importação realize a
criação de um banco
chamado bancodeHora e tente novamente.
```
```
Acessar em http://local.horatrabalhada.com
```
```
Caso queira utilizar banco de dados na sua
implementação do projeto, é possível acessar o
método de leitura em:
model: MTurno::read_registros
Por meio do controller:
Horatrabalhada->read_registros
```
```
3
```

```
Responsável por acessar o model podendo criar objetos
do tipo Turno que são usados nas operações de
comparação que ocorrem nos models.
```
```
HoraTrabalhada->montaTurnoCall()
```
```
Implementa a comparação de horas verificando
os valores de da hora de entrada e classificando como
horas diurnas ou noturnas, adcionando neste momento
os minutos referentes a diferença do período até a
primeira hora de trabalho concluída. Será explicado no
slide 8.
Existem também algumas funções que não estão
sendo utilizadas que serviram como base para o
aprendizado necessário para a resolução do problema..
horasTurno/app/Controllers/Horatrabalhada.php
```
### /app/Controllers/Horatrabalhada.php

```
4
```

```
Página inicial, onde é possível receber os valores de
entrada e saída do turno para o cálculo que será realizado.
```
```
Controller
-HoraTrabalhada.php/index()
horasTurno/app/Views/input_hora.php
```
Call
–horaTrabalhada/montaTurnoCall()
Recebendo valores de

#### _$POST[‘$horaEntrada’, ‘$horaSaida’];

```
View
```
#### -inputHora.php

```
Relógio utiliza Jquery na implementação
```
### HoraTrabalhada/index

```
5
```

```
Página inicial, onde é possível receber os valores de
entrada e saída do turno para o cálculo que será realizado.
```
```
Controller
HoraTrabalhada.php/montaTurnoCall()
Acessa o model MTurno, possibilitando a criação do objeto.
horasTurno/app/Controllers/Horatrabalhada.php
```
Call

#### -FUTURAMENTE

```
View
navbar
```
#### output_comparaHora.php

```
horasTurno/app/Views/output_comparaHora.php
```
### HoraTrabalhada/montaTurnoCall()

```
6
```

Responsável por implementar o objeto turno, por se tratar de um
Model, já existe. Uma

```
horasTurno/app/Controllers/Horatrabalhada.php
```
Métodos:
**montaTurno(){}:
comparaHoras(){}**
save_turno(){};*
loadAllTurnos(){};
analiseHora(){};
classificaHora();
pegaHora();*;

```
Atributos:
Time horaEntrada
Time horaSaida
Time PeriodoDiurno
Time PeriodoNoturno
Var turno
```
```
horasTurno/app/Models/MTurno.php
```
### HoraTrabalhada/index/app/Models/MTurno.php

```
7
```

```
MTurno::comparaHoras()
```
```
Implementa a comparação de horas
verificando os valores de da hora de entrada e
saída classificando-as como horas diurnas ou
noturnas, adicionando neste momento os minutos
referentes a diferença do período até a primeira
hora de trabalho concluída,
Após isso acontece um loop onde é
adicionado 1 a cada hora até chegarmos no horário
final e também classificando como horas noturnas
e diurnas.
Por fim o algoritmo realiza algumas
operações utilizando comprações entre objetos
Time e objetos DateTime que são atributos da
classe Turno;
```
```
horasTurno/app/Models/MTurno.php
```
### /app/models/MTurno::montaTurno()

```
8
```

### Algoritmo de comparação

```
9
```

### Algoritmo de comparação

```
10
```

#### Qualquer dúvida

#### henriquelopes@artebodoque.com

#### 32988055272

#### Henrique Lopes

```
11
```

