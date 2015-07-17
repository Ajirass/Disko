<?php
namespace AppBundle\Manager\Core;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class BaseManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $repository;

    /**
     * @var \Doctrine\ORM\Mapping\ClassMetadata
     */
    protected $metadata;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     * @param string                      $class
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        $this->repository = $em->getRepository($class);

        $this->metadata = $em->getClassMetadata($class);
        $this->class = $this->metadata->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getClass()
    {
        return $this->class;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @return Mixed
     */
    public function create()
    {
        $class = $this->getClass();

        return new $class();
    }

    /**
     * @param $entity
     * @param bool $andFlush
     */
    public function update($entity, $andFlush = true)
    {
        $this->em->persist($entity);
        if ($andFlush) {
            $this->em->flush();
        }
    }

    /**
     * @param $entity
     * @param bool $andFlush
     */
    public function delete($entity, $andFlush = true)
    {
        $this->em->remove($entity);
        if ($andFlush) {
            $this->em->flush();
        }
    }

    /**
     * @param array $criteria
     * @param bool  $exception
     *
     * @return object|null
     *
     * @throws NotFoundHttpException
     */
    public function findOneBy(array $criteria, $exception = false)
    {
        $entity = $this->repository->findOneBy($criteria);
        if ($exception && !$entity) {
            throw new NotFoundHttpException('Unable to find entity.');
        }

        return $entity;
    }

    /**
     * @param array        $criteria
     * @param array        $order
     * @param null|integer $limit
     * @param null|integer $offset
     *
     * @return array
     */
    public function findBy(array $criteria, array $order = [], $limit = null, $offset = null)
    {
        return $this->repository->findBy($criteria, $order, $limit, $offset);
    }

    /**
     * @param int  $id
     * @param bool $exception
     *
     * @return mixed
     *
     * @throws NotFoundHttpException
     */
    public function find($id, $exception = false)
    {
        $entity = $this->repository->find($id);
        if ($exception && !$entity) {
            throw new NotFoundHttpException('Unable to find entity.');
        }

        return $entity;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @param type $entity
     */
    public function refresh($entity)
    {
        $this->em->refresh($entity);
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
}