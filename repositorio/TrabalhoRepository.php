<?php

require_once 'interfaces/GenericRepository.php';

define("RETORNA_TRABALHOS_EMAIL",'SELECT   t.id as id,
                                           p.nome as nome,
                                           p.email as email,
                                           c.nome as curso,
                                           t.titulo as titulo,
                                           t.status_r as status,
                                           year(e.data_inicio) as ano,
                                           e.id as id_evento
                                    FROM participante p,
                                         curso c,
                                         trabalho t,
                                         evento e,
                                         participantextrabalho pxt
                                    WHERE p.email = :email
                                      AND e.id = t.id_evento
                                      AND p.id_curso = c.id
                                      AND t.id = pxt.id_trabalho
                                      AND p.id = pxt.id_participante
                                      AND t.status_atualizacao <> \'D\'
                                      ORDER BY ano DESC');

define("RETORNA_TODOS_TRABALHOS_X_AUTORES",'SELECT t.id AS id,
                                                   p.nome AS nome,
                                                   p.email AS email,
                                                   c.nome AS curso,
                                                   t.titulo AS titulo,
                                                   year(e.data_inicio) AS ano,
                                                   t.status_r AS status
                                            FROM participante p,
                                                 evento e,
                                                 curso c,
                                                 trabalho t,
                                                 participantextrabalho pxt
                                            WHERE p.id_curso = c.id
                                              AND e.id = t.id_evento
                                              AND t.id = pxt.id_trabalho
                                              AND p.id = pxt.id_participante
                                              AND t.status_atualizacao <> \'D\'
                                            ORDER BY t.titulo');

define("RETORNA_TODOS_TRABALHOS_X_AUTORES_CURRENT_YEAR",
                                            'SELECT t.id AS id,
                                                   p.nome AS nome,
                                                   p.email AS email,
                                                   c.nome AS curso,
                                                   t.titulo AS titulo,
                                                   year(e.data_inicio) AS ano,
                                                   t.status_r AS status
                                            FROM participante p,
                                                 evento e,
                                                 curso c,
                                                 trabalho t,
                                                 participantextrabalho pxt
                                            WHERE p.id_curso = c.id
                                              AND e.id = t.id_evento
                                              AND t.id = pxt.id_trabalho
                                              AND p.id = pxt.id_participante
                                              AND t.status_atualizacao <> \'D\'
                                              AND YEAR(e.data_inicio) = YEAR(CURDATE())
                                            ORDER BY t.titulo');

define("RETORNA_TODOS_TRABALHOS_X_AUTORES_BY_EVENT_ID", 'SELECT t.id AS id,
                                                   p.nome AS nome,
                                                   p.email AS email,
                                                   c.nome AS curso,
                                                   t.titulo AS titulo,
                                                   year(e.data_inicio) AS ano,
                                                   t.status_r AS status
                                            FROM participante p,
                                                 evento e,
                                                 curso c,
                                                 trabalho t,
                                                 participantextrabalho pxt
                                            WHERE p.id_curso = c.id
                                              AND e.id = t.id_evento
                                              AND t.id = pxt.id_trabalho
                                              AND p.id = pxt.id_participante
                                              AND t.status_atualizacao <> \'D\'
                                              AND e.id = :evento_id
                                            ORDER BY t.titulo');


define("RETORNA_TODOS_TRABALHOS_X_AUTORES_CURSO",'SELECT t.id AS id,
                                                   p.nome AS nome,
                                                   p.email AS email,
                                                   c.nome AS curso,
                                                   t.titulo AS titulo,
                                                   t.status_r AS status,
                                                   year(e.data_inicio) as ano
                                            FROM participante p,
                                                 curso c,
                                                 evento e,
                                                 trabalho t,
                                                 participantextrabalho pxt
                                            WHERE p.id_curso = c.id
                                              AND e.id = t.id_evento
                                              AND t.id = pxt.id_trabalho
                                              AND p.id = pxt.id_participante
                                              AND t.status_atualizacao <> \'D\'
                                              AND c.id = :curso_id
                                              AND e.id = :evento_id
                                            ORDER BY t.titulo');

class TrabalhoRepository implements GenericRepository{
    protected $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function findAllBySql($sql, $bindings = array())
    {
        return $this->db->getAllBySql($sql, $bindings);
    }


    public function findOne($id){
        return $this->db->findById( 'trabalho',$id );
    }

    public function save(BaseDataTransferObject $dto){

        if ($dto instanceof Trabalho) {
            // from DTO to SimpleBean
            // no need pass id
            // this id is automatically generated
            // by MySQL db

            $trabalho = $this->db->load('trabalho');
            $trabalho->titulo = $dto->titulo;
            $trabalho->resumo = $dto->resumo;
            $trabalho->palavras_chave = $dto->palavrasChave;
            $trabalho->status_r = $dto->statusR;
            $trabalho->comentarios = $dto->comentarios;
            $trabalho->id_curso = $dto->idCurso;
            $trabalho->id_tipoatividade = $dto->idTipoAtividade;
            $trabalho->id_evento = $dto->idEvento;
            $trabalho->id_orientador = $dto->idOrientador;
            $trabalho->status_atualizacao = $dto->statusAtualizacao;
            $trabalho->id_coorientador = $dto->idCoorientador;


            // save the dto
            return $this->db->save($trabalho);  /*retorna o id do trabalho*/

        } else {
            throw new InvalidArgumentException;
        }
    }

    public function remove(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Trabalho) {
            $bean = $this->findOne($dto->id);
            return  $this->db->trash($bean);
        }

    }

    public function update(BaseDataTransferObject $dto)
    {
        if ($dto instanceof Trabalho) {
            $trabalho = $this->findOne($dto->id);
            $trabalho->titulo = $dto->titulo;
            $trabalho->resumo = $dto->resumo;
            $trabalho->palavras_chave = $dto->palavrasChave;
            $trabalho->status_r = $dto->statusR;
            $trabalho->comentarios = $dto->comentarios;
            $trabalho->id_curso = $dto->idCurso;
            $trabalho->id_tipoatividade = $dto->idTipoAtividade;
            $trabalho->id_evento = $dto->idEvento;
            $trabalho->id_orientador = $dto->idOrientador;
            $trabalho->status_atualizacao = $dto->statusAtualizacao;
            $trabalho->id_coorientador = $dto->idCoorientador;
            return  $this->db->save($trabalho);
        }

    }


    public function updateTrabalhoReviewed($id, $titulo, $resumo, $keyword, $idOrientador, $idTipoAtividade, $idCoorientador)
    {
        $trabalho = $this->findOne($id);

        if($trabalho->status_r==RESUMO_STATUS_REENVIAR){
            $trabalho->status_r=RESUMO_STATUS_CORRIGIDO;
        }else{
            $trabalho->status_r=RESUMO_STATUS_EDITADO;
        }

        if( strlen($idCoorientador)<=0 || !isset($idCoorientador) )
            $idCoorientador = null;

        $trabalho->titulo = $titulo;
        $trabalho->resumo = $resumo;
        $trabalho->palavras_chave = $keyword;
        $trabalho->status_atualizacao = STATUS_ATUALIZACAO_REVISADO;
        $trabalho->id_orientador    = $idOrientador;
        $trabalho->id_tipoatividade = $idTipoAtividade;
        $trabalho->id_coorientador  = $idCoorientador;


        return  $this->db->save($trabalho);

    }




    public function findAll()
    {
        return $this->db->findAll('trabalho');
    }

    public function findAllTrabalhosByEmail($email)
    {
        return $this->findAllBySql(RETORNA_TRABALHOS_EMAIL, [':email' => $email] );
    }

    public function updateStatusRemovidoById($id)
    {
        $trabalho = $this->findOne($id);
        $trabalho->status_atualizacao = 'D';
        return $this->db->save($trabalho);

    }




    public function findAllTrabalhosAndAutoresByIdAndEventId($id, $evento_id){
        return $this->findAllBySql(RETORNA_TODOS_TRABALHOS_X_AUTORES_CURSO, [':curso_id'=> $id,
                                                                                 ':evento_id'=> $evento_id]);
    }

    public function findAllTrabalhosAndAutoresByEventId($currentEventId){
        return $this->findAllBySql(RETORNA_TODOS_TRABALHOS_X_AUTORES_BY_EVENT_ID, [':evento_id'=> $currentEventId]);
    }

    public function findAllTrabalhosAndAutoresByCurrentYear(){
        return $this->findAllBySql(RETORNA_TODOS_TRABALHOS_X_AUTORES_CURRENT_YEAR);
    }

    public function findAllTrabalhosAndAutores(){
        return $this->findAllBySql(RETORNA_TODOS_TRABALHOS_X_AUTORES);
    }

    public function updateReviewByIdTrabalho($id, $status, $comentarios){
        if( !isset($comentarios) || !isset($status) ||  !isset($id)  ){
            throw new InvalidArgumentException('Campos requeridos !');
        }


        $trabalho 		  = $this->findOne($id);
        $trabalho->status_r           = $status;
        $trabalho->comentarios        = $comentarios;
        $trabalho->status_atualizacao = 'R';

        return $this->db->save($trabalho);
    }
}