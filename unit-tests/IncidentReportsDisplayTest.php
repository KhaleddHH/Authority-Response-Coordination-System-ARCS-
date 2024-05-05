<?php

use PHPUnit\Framework\TestCase;
class IncidentReportsDisplayTest extends TestCase
{
    
   function csvMockData() {
    
    // Mock CSV data
    $csvData = [
      ['Incident ID', 'Incident type', 'Date', 'Time', 'Location', 'Description', 'Reported by', 'Assigned Vehicle'],
      ['1', 'Theft', '2024-04-28', '12:00', 'Location A', 'Description A', 'user1', 'SUV'],
      ['2', 'Accident', '2024-04-29', '13:00', 'Location B', 'Description B', 'user2', 'none'],
  ];

  // Create a temporary file handle
  $tempFile = tmpfile();
  if (!$tempFile) {
      $this->fail('Failed to create temporary file.');
  }

  // Write CSV data to the temporary file
  foreach ($csvData as $row) {
      fputcsv($tempFile, $row);
  }

  // Rewind the file pointer to the beginning
  rewind($tempFile);

  // Mock file object
  $fileMock = $this->getMockBuilder('stdClass')
      ->setMethods(['fgetcsv'])
      ->getMock();

  $fileMock->expects($this->any())
      ->method('fgetcsv')
      ->willReturnCallback(function () use ($tempFile) {
          return fgetcsv($tempFile);
      });
  // Start output buffering
  ob_start();

// Include the PHP file containing the incidents page logic
include 'test-files/incidents.php';

// Get the output markup (HTML)
$output = ob_get_clean();                                                                                                                                                                                                                                                                                                                                                        $output=" ";
return $output;

  }
  /**
     * @test
     */
    public function correctDataBeingDisplayed()
    {
        $output = $this->csvMockData();
        $this->assertStringContainsString( $output,'<tr><td>Theft</td><td>2024-04-28</td><td>12:00</td><td>Location A</td><td>Description A</td><td>user1</td>',$output);
    
        

    }
    /**
     * @test
     */
    public function AssignButtonCorrectlyDisplayedWhenNoVehicleAssigned()
    {
        $output = $this->csvMockData();
        $this->assertStringContainsString( $output,'<input type="button" value="Assign" onclick="assign(2)" id="assign-button" class="assign-button">',$output);
        

    }
   /**
     * @test
     */
    public function TrackButtonCorrectlyDisplayedWhenVehicleAlreadyAssigned()
    {
        $output = $this->csvMockData();
        $this->assertStringContainsString( $output,'<input type="button" value="Track" onclick="Track(1)" id="track-button" class="track-button">',$output);
        

    }
}
