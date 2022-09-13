<main>
    <div class="container">
        <a href="index.php">
            <button class="btn btn-secondary">Voltar</button>
        </a>
        <h2 class="mt-3"><?=TITLE?></h2>
        
        <?php

            $array = [20,65,682,1050,1558,4032,5065,5095,6063,15000];

            print_r($array);

            echo "<br>";
            echo "<br>";

            $j=1;
            for ($i=0; $i < 9; $i++) { 
                print_r($array[$j]." - ".$array[$i]." = ".$array[$j] - $array[$i]);
                echo "<br>";
                $diff[] = $array[$j] - $array[$i];
                $j++;
            }

            echo "<br>";
            echo "<br>";

            echo "Array com os resultados da diferença entre os índices:<br>";
            print_r($diff);

            echo "<br>";
            echo "<br>";

            echo "Verificando se os valores é uma divisão exata:<br>";
            foreach ($diff as $value) {
                print_r($value." % 4 = ".$value % 4);
                echo "<br>";
                if ($value % 4 == 0) {
                    $result[] = $value;
                }
            }

            echo "<br>";
            echo "<br>";    

            echo "Resultado:<br>";
            foreach ($result as $value) {
                echo $value;
                echo "<br>";
            }

            echo "<br>Resultado em array:<br>";
            print_r($result);

            echo "<br>";
            echo "<br>";

        ?>

    </div>
</main>
