<?php

namespace atk4\data\tests;

use atk4\data\Model;
use atk4\data\Persistence_SQL;

/**
 * @coversDefaultClass \atk4\data\Model
 */
class ConditionSQLTest extends SQLTestCase
{
    public function testBasic()
    {
        $a = [
            'user' => [
                1 => ['id' => 1, 'name' => 'John', 'gender' => 'M'],
                2 => ['id' => 2, 'name' => 'Sue', 'gender' => 'F'],
            ], ];
        $this->setDB($a);

        $db = new Persistence_SQL($this->db->connection);
        $m = new Model($db, 'user');
        $m->addFields(['name', 'gender']);

        $m->tryLoad(1);
        $this->assertEquals('John', $m['name']);
        $m->tryLoad(2);
        $this->assertEquals('Sue', $m['name']);

        $mm = clone $m;
        $mm->addCondition('gender', 'M');
        $mm->tryLoad(1);
        $this->assertEquals('John', $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals(null, $mm['name']);

        $this->assertEquals(
            'select `id`,`name`,`gender` from `user` where `gender` = :a',
            $mm->action('select')->render()
        );

        $mm = clone $m;
        $mm->withID(2); // = addCondition(id, 2)
        $mm->tryLoad(1);
        $this->assertEquals(null, $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals('Sue', $mm['name']);
    }

    public function testOperations()
    {
        $a = [
            'user' => [
                1 => ['id' => 1, 'name' => 'John', 'gender' => 'M'],
                2 => ['id' => 2, 'name' => 'Sue', 'gender' => 'F'],
            ], ];
        $this->setDB($a);

        $db = new Persistence_SQL($this->db->connection);
        $m = new Model($db, 'user');
        $m->addFields(['name', 'gender']);

        $m->tryLoad(1);
        $this->assertEquals('John', $m['name']);
        $m->tryLoad(2);
        $this->assertEquals('Sue', $m['name']);

        $mm = clone $m;
        $mm->addCondition('gender', 'M');
        $mm->tryLoad(1);
        $this->assertEquals('John', $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals(null, $mm['name']);

        $mm = clone $m;
        $mm->addCondition('gender', '!=', 'M');
        $mm->tryLoad(1);
        $this->assertEquals(null, $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals('Sue', $mm['name']);

        $mm = clone $m;
        $mm->addCondition('id', '>', 1);
        $mm->tryLoad(1);
        $this->assertEquals(null, $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals('Sue', $mm['name']);

        $mm = clone $m;
        $mm->addCondition('id', 'in', [1, 3]);
        $mm->tryLoad(1);
        $this->assertEquals('John', $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals(null, $mm['name']);
    }

    public function testExpressions1()
    {
        $a = [
            'user' => [
                1 => ['id' => 1, 'name' => 'John', 'gender' => 'M'],
                2 => ['id' => 2, 'name' => 'Sue', 'gender' => 'F'],
            ], ];
        $this->setDB($a);

        $db = new Persistence_SQL($this->db->connection);
        $m = new Model($db, 'user');
        $m->addFields(['name', 'gender']);

        $m->tryLoad(1);
        $this->assertEquals('John', $m['name']);
        $m->tryLoad(2);
        $this->assertEquals('Sue', $m['name']);

        $mm = clone $m;
        $mm->addCondition($mm->expr('[] > 1', [$mm->getElement('id')]));
        $mm->tryLoad(1);
        $this->assertEquals(null, $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals('Sue', $mm['name']);

        $mm = clone $m;
        $mm->addCondition($mm->expr('[id] > 1'));
        $mm->tryLoad(1);
        $this->assertEquals(null, $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals('Sue', $mm['name']);
    }

    public function testExpressions2()
    {
        $a = [
            'user' => [
                1 => ['id' => 1, 'name' => 'John', 'surname' => 'Smith', 'gender' => 'M'],
                2 => ['id' => 2, 'name' => 'Sue', 'surname' => 'Sue', 'gender' => 'F'],
            ], ];
        $this->setDB($a);

        $db = new Persistence_SQL($this->db->connection);
        $m = new Model($db, 'user');
        $m->addFields(['name', 'gender', 'surname']);

        $m->tryLoad(1);
        $this->assertEquals('John', $m['name']);
        $m->tryLoad(2);
        $this->assertEquals('Sue', $m['name']);

        $mm = clone $m;
        $mm->addCondition($mm->expr('[name] = [surname]'));
        $mm->tryLoad(1);
        $this->assertEquals(null, $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals('Sue', $mm['name']);

        $mm = clone $m;
        $mm->addCondition($m->getElement('name'), $m->getElement('surname'));
        $mm->tryLoad(1);
        $this->assertEquals(null, $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals('Sue', $mm['name']);

        $mm = clone $m;
        $mm->addCondition($mm->expr('[name] != [surname]'));
        $mm->tryLoad(1);
        $this->assertEquals('John', $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals(null, $mm['name']);

        $mm = clone $m;
        $mm->addCondition($m->getElement('name'), '!=', $m->getElement('surname'));
        $mm->tryLoad(1);
        $this->assertEquals('John', $mm['name']);
        $mm->tryLoad(2);
        $this->assertEquals(null, $mm['name']);
    }

    public function testExpressionJoin()
    {
        $a = [
            'user' => [
                1 => ['id' => 1, 'name' => 'John', 'surname' => 'Smith', 'gender' => 'M', 'contact_id' => 1],
                2 => ['id' => 2, 'name' => 'Sue', 'surname' => 'Sue', 'gender' => 'F', 'contact_id' => 2],
                3 => ['id' => 3, 'name' => 'Peter', 'surname' => 'Smith', 'gender' => 'M', 'contact_id' => 1],
            ], 'contact' => [
                1 => ['id' => 1, 'contact_phone' => '+123 smiths'],
                2 => ['id' => 2, 'contact_phone' => '+321 sues'],
            ], ];
        $this->setDB($a);

        $db = new Persistence_SQL($this->db->connection);
        $m = new Model($db, 'user');
        $m->addFields(['name', 'gender', 'surname']);

        $m->join('contact')->addField('contact_phone');

        $m->tryLoad(1);
        $this->assertEquals('John', $m['name']);
        $this->assertEquals('+123 smiths', $m['contact_phone']);
        $m->tryLoad(2);
        $this->assertEquals('Sue', $m['name']);
        $this->assertEquals('+321 sues', $m['contact_phone']);
        $m->tryLoad(3);
        $this->assertEquals('Peter', $m['name']);
        $this->assertEquals('+123 smiths', $m['contact_phone']);

        $mm = clone $m;
        $mm->addCondition($mm->expr('[name] = [surname]'));
        $mm->tryLoad(1);
        $this->assertEquals(false, $mm->loaded());
        $mm->tryLoad(2);
        $this->assertEquals('Sue', $mm['name']);
        $this->assertEquals('+321 sues', $mm['contact_phone']);
        $mm->tryLoad(3);
        $this->assertEquals(false, $mm->loaded());

        $mm = clone $m;
        $mm->addCondition($mm->expr('"+123 smiths" = [contact_phone]'));
        $mm->tryLoad(1);
        $this->assertEquals('John', $mm['name']);
        $this->assertEquals('+123 smiths', $mm['contact_phone']);
        $mm->tryLoad(2);
        $this->assertEquals(null, $mm['name']);
        $this->assertEquals(null, $mm['contact_phone']);
        $mm->tryLoad(3);
        $this->assertEquals('Peter', $mm['name']);
        $this->assertEquals('+123 smiths', $mm['contact_phone']);
    }
}
