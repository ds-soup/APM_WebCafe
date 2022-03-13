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
- php, mysql 연동문제 (해결)
  - sudo apt-get install php7.3-mysql 패키지를 통해 연결 설정.
  
- php mysql prepared statement 구현 (해결)
  - https://runebook.dev/ko/docs/php/mysqli.prepare
  
- php-mysql error : (해결)
    - message : Call to a member function execute() 
    - 해결방법. sql문에 적힌 테이블에 접근 권한이 없을 때 발생할 수 있음.
    
 - textarea 앞 space bar가 default로 입력되는 현상 (해결)
     - "<textarea> </textarea>" 일때 발생
     - "<textarea></textarea>" 일 경우 해결.

  
### 구현 완료

- 회원 가입
- 로그인 및 세션 유지
- 관리자 게시판 및 사용자 게시판 (CRUD 게시판)
- 게시판 페이징
- 게시글에 댓글 작성

### 미구현 부분
 - Admin Page 제작
 - 게시판 검색 기능
 - 파일 업로드
 
### 시큐어코딩 관련 자료 정리
[Secure Coding 자료 정리](https://dookie2.tistory.com)

### 결과물
- 게시판 이미지
 <img src="https://s3.us-west-2.amazonaws.com/secure.notion-static.com/1c739600-796d-4ab6-9d8a-081173c72b1e/Untitled.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Credential=AKIAT73L2G45EIPT3X45%2F20220313%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20220313T060258Z&X-Amz-Expires=86400&X-Amz-Signature=a385b43b6910fc12fa371a4d409ac2b4f69a5a86699d99d5aa84ce06854521a6&X-Amz-SignedHeaders=host&response-content-disposition=filename%20%3D%22Untitled.png%22&x-id=GetObject">
 <img src="https://s3.us-west-2.amazonaws.com/secure.notion-static.com/58a5176e-3f77-41e7-bca6-cc377611420d/Untitled.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Credential=AKIAT73L2G45EIPT3X45%2F20220313%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20220313T060352Z&X-Amz-Expires=86400&X-Amz-Signature=a278d4c1e9a5e40fbb3852b3f75d845c1f6d9a6dafcab9c5f1352c79f4a83282&X-Amz-SignedHeaders=host&response-content-disposition=filename%20%3D%22Untitled.png%22&x-id=GetObject">
      
	



