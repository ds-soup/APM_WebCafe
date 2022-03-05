## 개인 웹 블로그
	정보 공유가 목적인 웹 어플리케이션. 개인 블로그 제작 프로젝트입니다.

### 주요 기능
- CRUD 게시판
	study 게시판 ( 관리자만이 작성 가능 )
	story 게시판
    forum 게시판
	자유게시판
- View
	최근에 게시된 글 목록
- 구현 목표
	사용자 별 세션 유지
    
#### 에러사항
- php, mysql 연동문제
  - sudo apt-get install php7.3-mysql 패키지를 통해 연결 설정.
  
- php mysql prepared statement 구현
  - https://runebook.dev/ko/docs/php/mysqli.prepare
  
- php-mysql error :
    - message : Call to a member function execute() 
    - 해결방법. sql문에 적힌 테이블에 접근 권한이 없을 때 발생할 수 있음.
    

  
### 구현 완료

- 회원 가입

  
 
	



