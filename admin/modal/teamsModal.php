<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Create Team</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Group Name</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="name" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="assignadviser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Assign Adviser</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <input type="hidden" id="assignadviser_teams_id" name="teams_id" required>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Adviser</label>
                    <div class="col-sm-12">
                      <select class="form-control" id="" name="adviser_id" required>
                        <?php $sql = "SELECT * FROM users WHERE type = 1";
                        $stmt = $this->conn()->query($sql);
                        while ($row = $stmt->fetch()) { ?>
                          
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
                          
                        <?php } ?>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="assignadviser"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Team</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Group Name</label>
                    <div class="col-sm-12">
                      <input type="hidden" class="form-control" id="edit_teams_id" name="teams_id" required>
                      <input class="form-control" id="edit_name" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Thesis Title</label>
                    <div class="col-sm-12">
                      <input title="to edit go to your profile" class="form-control" id="edit_thesis" name="thesis_title">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="edit"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addmember">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Group Member</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Member Name</label>
                    <div class="col-sm-12">
                      <select class="form-control" id="" name="users_id" required>
                        <?php $sql = "SELECT * FROM users WHERE type = 2 AND users.id NOT IN (SELECT users_id FROM teams_member)";
                        $stmt = $this->conn()->query($sql);
                        while ($row = $stmt->fetch()) { ?>
                          
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
                          
                        <?php } ?>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="addmember"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>




<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <input type="hidden" name="teams_member_id" id="delete_teams_member_id">
                <div class="text-center">
                    <p>Are you sure you want to remove this member?</p>
                    <h2 class="bold catname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="deleteteams">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <input type="hidden" name="teams_id" id="deleteteams_teams_id">
                <div class="text-center">
                    <p>DELETE TEAMS</p>
                    <h2 class="bold catname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger" name="deleteteams"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changestatus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Change Status</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Status</label>
                    <div class="col-sm-12">
                      <input type="hidden" class="form-control" id="changestatus_teams_id" name="teams_id" required>
                      <select class="form-control" name="status" required>
                        <option value="1">Passed</option>
                        <option value="2">Redefense</option>
                        <option value="3">Failed</option>
                      </select>
                    </div>
                    <label for="project_list_id" class="col-sm-12">Grade</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="grade" required>
                            <option value="4.00">4.00</option>
                            <option value="3.75">3.75</option>
                            <option value="3.50">3.50</option>
                            <option value="3.25">3.25</option>
                            <option value="3.00">3.00</option>
                            <option value="2.75">2.75</option>
                            <option value="2.50">2.50</option>
                            <option value="2.25">2.25</option>
                            <option value="2.00">2.00</option>
                            <option value="1.75">1.75</option>
                            <option value="1.50">1.50</option>
                            <option value="1.25">1.25</option>
                            <option value="1.00">1.00</option>
                            <option value="0.00">0.00</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary" name="changestatus"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="changestatus2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Change Status</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Status</label>
                    <div class="col-sm-12">
                      <input type="hidden" class="form-control" id="changestatus2_teams_id" name="teams_id" required>
                      <select class="form-control" name="status" required>
                        <option value="1">APPROVED</option>
                        <option value="2">DECLINED</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="changestatus2"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="admincomment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Set Comment</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Comment</label>
                    <div class="col-sm-12">
                      <input type="hidden" class="form-control" id="admincomment_teams_id" name="teams_id" required>
                      <textarea class="form-control" id="edit_name" name="comment" rows="6" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="admincomment"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="panelist">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Panelist</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Full Name</label>
                    <div class="col-sm-12">
                      <input type="hidden" class="form-control" id="panelist_teams_id" name="teams_id" required>
                      <input class="form-control" name="fullname" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="panelist"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!--upload form coordinator approval-->
<div class="modal fade" id="fca">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Upload Form Coordinator Approval</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-12">
                      <input type="hidden" class="form-control" id="teams_id" name="teams_id" required>
                      <input type="file" class="form-control" name="fca_file" accept="application/pdf" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="fca"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!--upload defense fee-->
<div class="modal fade" id="df">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Upload Defense Fee</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-12">
                      <input type="hidden" class="form-control" id="df_teams_id" name="df_teams_id" required>
                      <input type="file" class="form-control" name="file" accept="application/pdf" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="df"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!--upload form coordinator approval 4th-->
<div class="modal fade" id="fca4">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Upload Form Coordinator Approval 4th year</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-12">
                      <input type="hidden" class="form-control" id="teams_id4" name="teams_id" required>
                      <input type="file" class="form-control" name="fca_file4" accept="application/pdf" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="fca"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!--upload defense fee 4th-->
<div class="modal fade" id="df4">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Upload Defense Fee 4th year</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/teamsController.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-12">
                      <input type="hidden" class="form-control" id="df_teams_id4" name="df_teams_id" required>
                      <input type="file" class="form-control" name="file4" accept="application/pdf" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="df"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>