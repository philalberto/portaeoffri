select articolo.id_tipo_articolo,
       tipo_articolo.descrizione as descizione_tipo_articolo,
       evento_articolo.id_articolo,
       evento_articolo.id_persona,
	   persona.nome as nome_persona,
	   articolo.descrizione as descrizione_articolo,
	   sum(evento_articolo.quantita) as quantita
  from evento_articolo,
       articolo,
	   tipo_articolo,
	   persona
 where evento_articolo.id_articolo = articolo.id
   and evento_articolo.id_persona  = persona.id
   and articolo.id_tipo_articolo   = tipo_articolo.id
   and id_evento = 12
 group by id_articolo,id_persona
 
union 

select articolo.id_tipo_articolo,
       tipo_articolo.descrizione as descizione_tipo_articolo,
       articolo.id as id_articolo,
       null        as id_persona,
	   null        as nome_persona,
	   articolo.descrizione as descrizione_articolo,
	   null as quantita
  from articolo,
	   tipo_articolo
 where articolo.id_tipo_articolo   = tipo_articolo.id
  
order by id_tipo_articolo,id_articolo,id_persona

