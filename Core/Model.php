<?php


namespace Core;


class Model
{
    /**
     * La connexion PDO
     * @var null|PDO
     */
    protected $db = null;

    /**
     * Le nom de la table
     * @var null|string
     */
    protected $table = null;

    function __construct()
    {
        if (is_null($this->db))
            $this->db = DbProvider::getDb();
        
        $this->table = str_replace('App\\Models\\', '', get_class($this)) . 's';
    }

    /**
     * Fonction qui permet de selectionner des données en base de donnée.
     * @param  array $conditions les conditions que l'on veut
     * @param  string $table le nom de la table
     * @internal param array|null $joins Si l'on veut des joins
     * @return array [type]                 un object contenant les données demandées
     */
    public function get(array $conditions = null, $table = null)
    {

        if (method_exists($this, "beforeFilter"))
            $this->beforeFilter($this->data);

        $query = "SELECT ";

        // Si on a des champs définis
        if (!isset($conditions['fields']))
            $query .= "*";
        else
            $query .= $conditions['fields'];


        if (is_null($table)) {
            $query .= " FROM " . $this->table;
        } else {
            $query .= " FROM " . $table;
        }

        // Si on doit faire un join
        if (isset($conditions['joins'])) {
            $joins = [];
            foreach ($conditions['joins'] as $j) {
                if (!isset($this->joins) || !isset($this->joins[$j])) {
                    debug("Le model " . $this->name . " n'a pas d'association avec la table $j ! Veuillez créer un tableau public \$joins dans votre model " . $this->name, false);
                } else {
                    $joins[] = " JOIN $j ON $j.{$this->primaryKey} = {$this->table}." . $this->joins[$j];
                }
            }
            $query .= implode(" AND ", $joins);
        }

        // Si on a un Where
        if (isset($conditions['where'])) {
            if (!is_array($conditions['where'])) {
                $query .= " WHERE " . $conditions['where'];
            } else {
                $query .= " WHERE ";
                $cond = [];
                foreach ($conditions['where'] as $k => $v) {
                    if (!is_numeric($v))
                        $v = "'" . addslashes($v) . "'";
                    $cond[] = "$k=$v";
                }
                $query .= implode(' AND ', $cond);
            }
        }

        // Si on a une limite
        if (isset($conditions['limit'])) {
            if (isset($conditions['offset'])) {
                $query .= " LIMIT " . $conditions['offset'] . "," . $conditions['limit'];
            } else {
                $query .= " LIMIT " . $conditions['limit'];
            }

        }

        // Si on a un group by
        if (isset($conditions['groupBy'])) {
            $query .= " GROUP BY " . $conditions['groupBy'];
        }

        // Si on a un order
        if (isset($conditions['order'])) {
            $query .= " ORDER BY " . $conditions['order'];
        }

        // debug($query);
        $req = $this->db->query($query);

        return $req->fetchAll();
    }

} 