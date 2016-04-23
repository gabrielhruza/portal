<?php

namespace PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nota
 *
 * @ORM\Table(name="nota")
 * @ORM\Entity(repositoryClass="PortalBundle\Repository\NotaRepository")
 */
class Nota
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255, unique=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="notas")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @ORM\OneToOne(targetEntity="Archivo", inversedBy="nota", cascade="remove")
     * @ORM\JoinColumn(name="imagendestacada", referencedColumnName="id")
     */
    private $imagendestacada; 

    /**
     * @var boolean
     *
     * @ORM\Column(name="destacar", type="boolean")
     */
    private $destacar;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publicar", type="boolean")
     */
    private $publicar;






    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    



    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Nota
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set publicado
     *
     * @param boolean $publicado
     *
     * @return Nota
     */
    public function setPublicar($publicar)
    {
        $this->publicar = $publicar;

        return $this;
    }

    /**
     * Get publicar
     *
     * @return boolean
     */
    public function getPublicar()
    {
        return $this->publicar;
    }

    /**
     * Set destacar
     *
     * @param boolean $destacar
     *
     * @return Nota
     */
    public function setDestacar($destacar)
    {
        $this->destacar = $destacar;

        return $this;
    }

    /**
     * Get destacar
     *
     * @return string
     */
    public function getDestacar()
    {
        return $this->destacar;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     *
     * @return Nota
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Nota
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Nota
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set imagendestacada
     *
     * @param string $imagendestacada
     *
     * @return Nota
     */
    public function setImagendestacada($imagendestacada)
    {
        $this->imagendestacada = $imagendestacada;

        return $this;
    }

    /**
     * Get imagendestacada
     *
     * @return string
     */
    public function getImagendestacada()
    {
        return $this->imagendestacada;
    }
}
