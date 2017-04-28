/* Taller 4 de octubre  (><) -> join natural (π) -> Proyeccion  (σ) -> seleccion */

/* 
1. */
SELECT cod_asignatura AS "Codigo Asignatura", nom_asignatura AS "Nombre Asignatura" 
FROM asignatura WHERE grado = '1' ORDER BY nom_asignatura

π cod_asignatura (σ grado = '1' (asignatura))


/*
2. */
SELECT cod_profesor AS "Codigo Profesor", nom_profesor AS "Nombre Profesor" 
FROM profesor WHERE cod_aula = '1A01' ORDER BY nom_profesor

/* 
3. */ 
SELECT p.nom_profesor AS "Nombre Profesor" FROM profesor p 
INNER JOIN dicta d ON p.cod_profesor = d.cod_profesor 
INNER JOIN asignatura a ON d.cod_asignatura = a.cod_asignatura
WHERE a.grado = '1' GROUP BY p.nom_profesor

π nom_profesor (σ grado = '1' (profesor >< dicta >< asignatura ))


/* 
4. */
SELECT p.nom_profesor FROM profesor p 
INNER JOIN profesor_libro pl ON p.cod_profesor = pl.cod_profesor 
INNER JOIN libro l ON pl.cod_libro = l.cod_libro
WHERE l.nom_libro = 'Aprender y Enseñar en Educacion Infantil' 
GROUP BY p.nom_profesor 

/* 
5. */
SELECT profesor.nom_profesor FROM profesor 
INNER JOIN aula ON profesor.cod_aula = aula.cod_aula
INNER JOIN colegio ON aula.cod_colegio = colegio.cod_colegio
WHERE colegio.nom_colegio = 'C.P. Cervantes'

/* 
6. */
SELECT* FROM libro 
INNER JOIN editorial ON libro.cod_editorial = editorial.cod_editorial 
WHERE editorial.nom_editorial = 'Grao'

/* 
7. */
SELECT profesor.nom_profesor FROM profesor 
INNER JOIN profesor_libro ON profesor.cod_profesor = profesor_libro.cod_profesor
WHERE profesor_libro.fecha_prestamo = '2006-09-09' 








