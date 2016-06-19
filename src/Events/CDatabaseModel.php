<?php

namespace Anax\Events;

/**
 * Model for Users.
 *
 */
class CDatabaseModel implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;


    /**
     * Build a select-query.
     *
     * @param string $columns which columns to select.
     *
     * @return $this
     */
    public function query($columns = '*')
    {
        $this->db->select($columns)
            ->from($this->getSource());

        return $this;
    }

    /**
     * Build the where part.
     *
     * @param string $condition for building the where part of the query.
     *
     * @return $this
     */
    public function where($condition)
    {
        $this->db->where($condition);

        return $this;
    }

    /**
     * Build the where part.
     *
     * @param string $condition for building the where part of the query.
     *
     * @return $this
     */
    public function andWhere($condition)
    {
        $this->db->andWhere($condition);

        return $this;
    }

    public function orderBy($condition)
    {
        $this->db->orderBy($condition);

        return $this;
    }

    /**
     * Execute the query built.
     *
     * @param string $query custom query.
     *
     * @return $this
     */
    public function execute($params = [])
    {

        $this->db->execute($this->db->getSQL(), $params);
        $this->db->setFetchModeClass(__CLASS__);

        return $this->db->fetchAll();
    }
}