Feature: Verify if size of imagem is less then 700kb

	Scenario: Successfully describing scenario
		Given directory "test_img" exists
		And I have a file named "image.jpeg"
		When I do filesize
		Then I should see "File size is less then 700kb"
		
